<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\KetidakhadiranModel;

class Ketidakhadiran extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $ketidakhadiran;

    public function __construct()
    {
        $this->ketidakhadiran = new KetidakhadiranModel();
    }

    public function index()
    {
        $userdata = session()->get('userdata');
        $id_siswa = $userdata->id_siswa;
        $data = [
            'title' => 'Ketidakhadiran',
            'ketidakhadiran_all' => $this->ketidakhadiran->where('id_siswa', $id_siswa)->findAll()
        ];

        return view('siswa/ketidakhadiran/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Ajukan Ketidakhadiran',
            'validation' => \Config\Services::validation(),
        ];

        return view('siswa/ketidakhadiran/create', $data);
    }

    public function store()
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Jenis kelamin wajib diisi',
                    'min_length' => 'Nama minimal 4 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,10240]|mime_in[file,image/png,image/jpeg,image/jpg,application/pdf]',
                'errors' => [
                    'uploaded' => 'File wajib diupload',
                    'max_size' => 'Ukuran file melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, JPEG, dan PDF',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Ajukan Ketidakhadiran',
                'validation' => \Config\Services::validation(),
            ];

            echo view('siswa/ketidakhadiran/create', $data);
        } else {
            $file = $this->request->getFile('file');

            if ($file->getError() == 4) {
                $nama_file = '';
            } else {
                $nama_file = $file->getRandomName();
                $file->move('images/file_ketidakhadiran/', $nama_file);
            }

            $this->ketidakhadiran->insert([
                'id_siswa' => $this->request->getPost('id_siswa'),
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $nama_file,
                'status' => 'Pending',
            ]);

            session()->setFlashdata('message', 'Data ketidakhadiran berhasil ditambahkan');

            return redirect()->route('siswa.ketidakhadiran');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Ajuan Ketidakhadiran',
            'ketidakhadiran' => $this->ketidakhadiran->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('siswa/ketidakhadiran/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Jenis kelamin wajib diisi',
                    'min_length' => 'Nama minimal 4 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file,10240]|mime_in[file,image/png,image/jpeg,image/jpg,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, JPEG, dan PDF',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Siswa',
                'ketidakhadiran' => $this->ketidakhadiran->find($id),
                'validation' => \Config\Services::validation(),
            ];

            echo view('siswa/ketidakhadiran/edit', $data);
        } else {
            $file = $this->request->getFile('file');

            if ($file->getError() == 4) {
                $nama_file = $this->request->getPost('file_lama');
            } else {
                $nama_file = $file->getRandomName();
                $file->move('images/file_ketidakhadiran/', $nama_file);
            }

            $this->ketidakhadiran->update($id, [
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $nama_file,
                'status' => 'Pending',
            ]);

            session()->setFlashdata('message', 'Data ketidakhadiran berhasil diupdate');

            return redirect()->route('siswa.ketidakhadiran');
        }
    }

    public function delete($id)
    {
        $ketidakhadiran = $this->ketidakhadiran->find($id);

        if ($ketidakhadiran) {
            $this->ketidakhadiran->delete($id);

            session()->setFlashdata('message', 'Data ketidakhadiran berhasil dihapus');

            return redirect()->route('siswa.ketidakhadiran');
        }
    }
}
