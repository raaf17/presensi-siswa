<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;

class Kelas extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $kelas;
    protected $jurusan;
    protected $guru;
    protected $db;

    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->jurusan = new JurusanModel();
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'kelas_all' => $this->kelas->getAll(),
            'get_kelas' => $this->kelas->findAll(),
            'jurusan_select' => $this->jurusan->findAll(),
            'guru_select' => $this->guru->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/kelas/index', $data);
    }

    public function store()
    {
        $rules = [
            'id_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan wajib diisi',
                ]
            ],
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Guru wajib diisi',
                ]
            ],
            'nama_kelas' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama kelas wajib diisi',
                    'min_length' => 'Nama kelas minimal 2 karakter',
                    'max_length' => 'Nama kelas maksimal 30 karakter',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan wajib diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Kelas',
                'kelas_all' => $this->kelas->getAll(),
                'jurusan_select' => $this->jurusan->findAll(),
                'guru_select' => $this->guru->findAll(),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/kelas/index', $data);
        } else {
            $this->kelas->insert([
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'id_guru' => $this->request->getPost('id_guru'),
                'nama_kelas' => $this->request->getPost('nama_kelas'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);

            session()->setFlashdata('message', 'Data kelas berhasil ditambahkan');

            return redirect()->route('kelas');
        }
    }

    public function update($id)
    {
        $rules = [
            'id_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan wajib diisi',
                ]
            ],
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Guru wajib diisi',
                ]
            ],
            'nama_kelas' => [
                'rules' => 'required|min_length[2]|max_length[30]',
                'errors' => [
                    'required' => 'Nama kelas wajib diisi',
                    'min_length' => 'Nama kelas minimal 2 karakter',
                    'max_length' => 'Nama kelas maksimal 30 karakter',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan wajib diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Kelas',
                'validation' => \Config\Services::validation(),
                'kelas' => $this->kelas->find($id),
            ];

            echo view('admin/kelas/index', $data);
        } else {
            $this->kelas->update($id, [
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'id_guru' => $this->request->getPost('id_guru'),
                'nama_kelas' => $this->request->getPost('nama_kelas'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);

            session()->setFlashdata('message', 'Data kelas berhasil diupdate');

            return redirect()->route('kelas');
        }
    }

    public function delete($id)
    {
        $this->kelas->delete($id);

        session()->setFlashdata('message', 'Data kelas berhasil dihapus');

        return redirect()->route('kelas');
    }
}
