<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class Guru extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $guru;
    protected $db;

    public function __construct()
    {
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'guru_all' => $this->guru->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/guru/index', $data);
    }

    public function store()
    {
        $rules = [
            'nama_guru' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama guru wajib diisi',
                    'min_length' => 'Nama guru minimal 2 karakter',
                    'max_length' => 'Nama guru maksimal 30 karakter',
                ]
            ],
            'nip' => [
                'rules' => 'required|min_length[2]|max_length[20]',
                'errors' => [
                    'required' => 'NIP wajib diisi',
                    'min_length' => 'NIP minimal 2 karakter',
                    'max_length' => 'NIP maksimal 20 karakter',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Guru',
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/guru/index', $data);
        } else {
            $this->guru->insert([
                'nama_guru' => $this->request->getPost('nama_guru'),
                'nip' => $this->request->getPost('nip'),
            ]);

            session()->setFlashdata('message', 'Data guru berhasil ditambahkan');

            return redirect()->route('guru');
        }
    }

    public function update($id)
    {
        $rules = [
            'nama_guru' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama guru wajib diisi',
                    'min_length' => 'Nama guru minimal 2 karakter',
                    'max_length' => 'Nama guru maksimal 30 karakter',
                ]
            ],
            'nip' => [
                'rules' => 'required|min_length[2]|max_length[20]',
                'errors' => [
                    'required' => 'NIP wajib diisi',
                    'min_length' => 'NIP minimal 2 karakter',
                    'max_length' => 'NIP maksimal 20 karakter',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Guru',
                'validation' => \Config\Services::validation(),
                'guru' => $this->guru->find($id),
            ];

            echo view('admin/guru/index', $data);
        } else {
            $this->guru->update($id, [
                'nama_guru' => $this->request->getPost('nama_guru'),
                'nip' => $this->request->getPost('nip'),
            ]);

            session()->setFlashdata('message', 'Data guru berhasil diupdate');

            return redirect()->route('guru');
        }
    }

    public function delete($id)
    {
        $this->guru->delete($id);

        session()->setFlashdata('message', 'Data guru berhasil dihapus');

        return redirect()->route('guru');
    }

    public function trash()
    {
        $data = [
            'title' => 'Guru Trash',
            'guru_trash' => $this->guru->onlyDeleted()->findAll(),
        ];
        return view('admin/guru/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('guru')
                ->set('deleted_at', null, true)
                ->where(['id' => $id])
                ->update();
        } else {
            $this->db->table('guru')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            session()->setFlashdata('message', 'Data Berhasil Direstore');

            return redirect()->route('guru');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->guru->delete($id, true);

            session()->setFlashdata('message', 'Data Berhasil Dihapus Permanen');

            return redirect()->route('guru');
        } else {
            $this->guru->purgeDeleted();

            session()->setFlashdata('message', 'Data Trash Berhasil Dihapus Permanen');

            return redirect()->route('guru');
        }
    }
}
