<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\LokasiPresensiModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
    protected $pegawai;
    protected $users;
    protected $lokasipresensi;
    protected $jabatan;

    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
        $this->users = new UserModel();
        $this->lokasipresensi = new LokasiPresensiModel();
        $this->jabatan = new JabatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawais' => $this->pegawai->allPegawai(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/pegawai/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pegawai',
            'pegawai_detail' => $this->pegawai->detailPegawai($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/pegawai/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pegawai',
            'lokasipresensis' => $this->lokasipresensi->findAll(),
            'jabatans' => $this->jabatan->orderBy('nama_jabatan', 'asc')->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/pegawai/create', $data);
    }

    public function generateNIP()
    {
        $pegawaiTerakhir = $this->pegawai->select('nip')->orderBy('id', 'desc')->first();
        $nipTerakhir = $pegawaiTerakhir ? $pegawaiTerakhir->nip : 'PEG-0000';
        $angkaNIP = (int) substr($nipTerakhir, 4);
        $angkaNIP++;

        return 'PEG-' . str_pad($angkaNIP, 4, '0', STR_PAD_LEFT);
    }

    public function store()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 50 karakter',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Jenis kelamin wajib diisi',
                    'min_length' => 'Nama minimal 4 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 100 karakter',
                ]
            ],
            'no_handphone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Handphone wajib diisi'
                ]
            ],
            'id_jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan wajib diisi',
                ]
            ],
            'id_lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Presensi wajib diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10240]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'uploaded' => 'File foto wajib diupload',
                    'max_size' => 'Ukuran foto melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, dan JPEG',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username wajib diisi',
                    'is_unique' => 'Username sudah ada, silahkan buat username yang berbeda'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[20]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Nama minimal 8 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi',
                    'matches' => 'Konfirmasi password tidak cocok',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role wajib diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Pegawai',
                'lokasipresensis' => $this->lokasipresensi->findAll(),
                'jabatans' => $this->jabatan->orderBy('nama_jabatan', 'asc')->findAll(),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/pegawai/create', $data);
        } else {
            $nipBaru = $this->generateNIP();
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $nama_foto = '';
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move('assets/img/', $nama_foto);
            }

            $this->pegawai->insert([
                'id_lokasi_presensi' => $this->request->getPost('id_lokasi_presensi'),
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'nip' => $nipBaru,
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_handphone' => $this->request->getPost('no_handphone'),
                'foto' => $nama_foto,
            ]);

            $id_pegawai = $this->pegawai->insertID();
            $this->users->insert([
                'id_pegawai' => $id_pegawai,
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status' => 'Aktif',
                'role' => $this->request->getPost('role'),
            ]);

            session()->setFlashdata('message', 'Data pegawai berhasil ditambahkan');

            return redirect()->to(site_url('admin/pegawai'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pegawai',
            'lokasi' => $this->lokasipresensi->where('id', $id)->first(),
            'lokasipresensis' => $this->lokasipresensi->findAll(),
            'jabatans' => $this->jabatan->orderBy('nama_jabatan', 'asc')->findAll(),
            'pegawai' => $this->pegawai->editPegawai($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/pegawai/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 50 karakter',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Jenis kelamin wajib diisi',
                    'min_length' => 'Nama minimal 4 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 100 karakter',
                ]
            ],
            'no_handphone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Handphone wajib diisi'
                ]
            ],
            'id_jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan wajib diisi',
                ]
            ],
            'id_lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Presensi wajib diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,10240]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Ukuran foto melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, dan JPEG',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi',
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak cocok',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role wajib diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Pegawai',
                'lokasipresensis' => $this->lokasipresensi->findAll(),
                'jabatans' => $this->jabatan->orderBy('nama_jabatan', 'asc')->findAll(),
                'pegawai' => $this->pegawai->editPegawai($id),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/pegawai/edit', $data);
        } else {
            $nipBaru = $this->generateNIP();
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $nama_foto = $this->request->getFile('foto_lama');
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move('assets/img/', $nama_foto);
            }

            $this->pegawai->update($id, [
                'id_lokasi_presensi' => $this->request->getPost('id_lokasi_presensi'),
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_handphone' => $this->request->getPost('no_handphone'),
                'foto' => $nama_foto,
            ]);

            if ($this->request->getPost('password') == '') {
                $password = $this->request->getPost('password_lama');
            } else {
                $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            }

            $this->users->where('id_pegawai', $id)
                ->set([
                    'username' => $this->request->getPost('username'),
                    'password' => $password,
                    'status' => $this->request->getPost('status'),
                    'role' => $this->request->getPost('role'),
                ])->update();

            session()->setFlashdata('message', 'Data pegawai berhasil diupdate');

            return redirect()->to(site_url('admin/pegawai'));
        }
    }

    public function delete($id)
    {
        $pegawai = $this->pegawai->find($id);

        if ($pegawai) {
            $this->users->where('id_pegawai', $id)->delete();
            $this->pegawai->delete($id);

            session()->setFlashdata('message', 'Data pegawai berhasil dihapus');

            return redirect()->to(site_url('admin/pegawai'));
        }
    }
}
