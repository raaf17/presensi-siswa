<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JurusanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Jurusan extends BaseController
{
    protected $jurusan;
    protected $db;

    public function __construct()
    {
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jurusan',
            'jurusan_all' => $this->jurusan->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/jurusan/index', $data);
    }

    public function store()
    {
        $rules = [
            'nama_jurusan' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama jurusan wajib diisi',
                    'min_length' => 'Nama jurusan minimal 2 karakter',
                    'max_length' => 'Nama jurusan maksimal 30 karakter',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Jurusan',
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/jurusan/index', $data);
        } else {
            $this->jurusan->insert([
                'nama_jurusan' => $this->request->getPost('nama_jurusan')
            ]);

            session()->setFlashdata('message', 'Data jurusan berhasil ditambahkan');

            return redirect()->to(site_url('admin/jurusan'));
        }
    }

    public function update($id)
    {
        $rules = [
            'nama_jurusan' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama jurusan wajib diisi',
                    'min_length' => 'Nama jurusan minimal 2 karakter',
                    'max_length' => 'Nama jurusan maksimal 30 karakter',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Jurusan',
                'validation' => \Config\Services::validation(),
                'jurusan' => $this->jurusan->find($id),
            ];

            echo view('admin/jurusan/index', $data);
        } else {
            $this->jurusan->update($id, [
                'nama_jurusan' => $this->request->getPost('nama_jurusan')
            ]);

            session()->setFlashdata('message', 'Data jurusan berhasil diupdate');

            return redirect()->to(site_url('admin/jurusan'));
        }
    }

    public function delete($id)
    {
        $this->jurusan->delete($id);

        session()->setFlashdata('message', 'Data jurusan berhasil dihapus');

        return redirect()->to(site_url('admin/jurusan'));
    }

    public function trash()
    {
        $data = [
            'title' => 'Jurusan Trash',
            'jurusan_trash' => $this->jurusan->onlyDeleted()->findAll(),
        ];
        return view('admin/jurusan/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where(['id' => $id])
                ->update();
        } else {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            session()->setFlashdata('message', 'Data Berhasil Direstore');

            return redirect()->to(site_url('admin/jurusan'));
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->jurusan->delete($id, true);

            session()->setFlashdata('message', 'Data Berhasil Dihapus Permanen');

            return redirect()->to(site_url('admin/jurusan/index'));
        } else {
            $this->jurusan->purgeDeleted();

            session()->setFlashdata('message', 'Data Trash Berhasil Dihapus Permanen');

            return redirect()->to(site_url('admin/jurusan/index'));
        }
    }
}
