<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LokasiPresensiModel;
use CodeIgniter\HTTP\ResponseInterface;

class LokasiPresensi extends BaseController
{
    protected $lokasipresensi;

    public function __construct()
    {
        $this->lokasipresensi = new LokasiPresensiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Lokasi Presensi',
            'lokasipresensis' => $this->lokasipresensi->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/lokasipresensi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Lokasi Presensi',
            'lokasipresensi' => $this->lokasipresensi->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/lokasipresensi/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Lokasi Presensi',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/lokasipresensi/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Nama lokasi wajib diisi',
                    'min_length' => 'Nama lokasi minimal 3 karakter',
                    'max_length' => 'Nama lokasi maksimal 30 karakter'
                ]
            ],
            'alamat_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Alamat lokasi wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'tipe_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[10]',
                'errors' => [
                    'required' => 'Tipe lokasi wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 10 karakter'
                ]
            ],
            'latitude' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Latitude wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'longitude' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Longitude wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'radius' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Radius wajib diisi'
                ]
            ],
            'zona_waktu' => [
                'rules' => 'required|min_length[3]|max_length[10]',
                'errors' => [
                    'required' => 'Zona waktu wajib diisi',
                    'min_length' => 'Nama lokasi minimal 3 karakter',
                    'max_length' => 'Nama lokasi maksimal 10 karakter'
                ]
            ],
            'jam_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam masuk wajib diisi'
                ]
            ],
            'jam_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam pulang wajib diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Lokasi Presensi',
                'validation' => \Config\Services::validation()
            ];

            echo view('admin/lokasipresensi/create', $data);
        } else {
            $this->lokasipresensi->insert([
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'tipe_lokasi' => $this->request->getPost('tipe_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'zona_waktu' => $this->request->getPost('zona_waktu'),
                'jam_masuk' => $this->request->getPost('jam_masuk'),
                'jam_pulang' => $this->request->getPost('jam_pulang'),
            ]);

            session()->setFlashdata('message', 'Data Lokasi Presensi berhasil ditambahkan');

            return redirect()->to(site_url('admin/lokasipresensi'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Lokasi Presensi',
            'lokasipresensi' => $this->lokasipresensi->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/lokasipresensi/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Nama lokasi wajib diisi',
                    'min_length' => 'Nama lokasi minimal 3 karakter',
                    'max_length' => 'Nama lokasi maksimal 30 karakter'
                ]
            ],
            'alamat_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Alamat lokasi wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'tipe_lokasi' => [
                'rules' => 'required|min_length[3]|max_length[10]',
                'errors' => [
                    'required' => 'Tipe lokasi wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 10 karakter'
                ]
            ],
            'latitude' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Latitude wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'longitude' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Longitude wajib diisi',
                    'min_length' => 'Alamat lokasi minimal 3 karakter',
                    'max_length' => 'Alamat lokasi maksimal 100 karakter'
                ]
            ],
            'radius' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Radius wajib diisi'
                ]
            ],
            'zona_waktu' => [
                'rules' => 'required|min_length[3]|max_length[10]',
                'errors' => [
                    'required' => 'Zona waktu wajib diisi',
                    'min_length' => 'Nama lokasi minimal 3 karakter',
                    'max_length' => 'Nama lokasi maksimal 10 karakter'
                ]
            ],
            'jam_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam masuk wajib diisi'
                ]
            ],
            'jam_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam pulang wajib diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Lokasi Presensi',
                'lokasipresensi' => $this->lokasipresensi->find($id),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/lokasipresensi/edit', $data);
        } else {
            $this->lokasipresensi->update($id, [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'tipe_lokasi' => $this->request->getPost('tipe_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'zona_waktu' => $this->request->getPost('zona_waktu'),
                'jam_masuk' => $this->request->getPost('jam_masuk'),
                'jam_pulang' => $this->request->getPost('jam_pulang'),
            ]);

            session()->setFlashdata('message', 'Data Lokasi Presensi berhasil diupdate');

            return redirect()->to(site_url('admin/lokasipresensi'));
        }
    }

    public function delete($id)
    {
        $lokasipresensi = $this->lokasipresensi->find($id);

        if ($lokasipresensi) {
            $this->lokasipresensi->delete($id);

            session()->setFlashdata('message', 'Data Lokasi Presensi berhasil dihapus');

            return redirect()->to(site_url('admin/lokasipresensi'));
        }
    }
}
