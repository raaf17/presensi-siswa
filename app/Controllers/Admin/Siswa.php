<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\LokasiPresensiModel;
use App\Models\SiswaModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $siswa;
    protected $users;
    protected $lokasipresensi;
    protected $kelas;

    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->users = new UserModel();
        $this->lokasipresensi = new LokasiPresensiModel();
        $this->kelas = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa_all' => $this->siswa->allSiswa(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/siswa/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Siswa',
            'siswa_detail' => $this->siswa->detailSiswa($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/siswa/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'lokasi_select' => $this->lokasipresensi->findAll(),
            'kelas_select' => $this->kelas->orderBy('nama_kelas', 'asc')->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/siswa/create', $data);
    }

    public function store()
    {
        $rules = [
            'nisn' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'nama_siswa' => [
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
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas wajib diisi',
                ]
            ],
            'id_lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Presensi wajib diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username wajib diisi',
                    'is_unique' => 'Username sudah ada, silahkan buat username yang berbeda'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi',
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
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10240]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'uploaded' => 'File foto wajib diupload',
                    'max_size' => 'Ukuran foto melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, dan JPEG',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Siswa',
                'lokasi_select' => $this->lokasipresensi->findAll(),
                'kelas_select' => $this->kelas->orderBy('nama_kelas', 'asc')->findAll(),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/siswa/create', $data);
        } else {
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $nama_foto = '';
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move('images/users/', $nama_foto);
            }

            $this->siswa->insert([
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_lokasi_presensi' => $this->request->getPost('id_lokasi_presensi'),
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_handphone' => $this->request->getPost('no_handphone'),
            ]);

            $id_siswa = $this->siswa->insertID();
            $this->users->insert([
                'id_siswa' => $id_siswa,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'status' => 'Aktif',
                'role' => $this->request->getPost('role'),
                'foto' => $nama_foto
            ]);

            session()->setFlashdata('message', 'Data siswa berhasil ditambahkan');

            return redirect()->route('siswa');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Siswa',
            'lokasi' => $this->lokasipresensi->where('id', $id)->first(),
            'lokasi_select' => $this->lokasipresensi->findAll(),
            'kelas_select' => $this->kelas->orderBy('nama_kelas', 'asc')->findAll(),
            'siswa' => $this->siswa->editSiswa($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/siswa/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nisn' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama minimal 20 karakter',
                ]
            ],
            'nama_siswa' => [
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
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas wajib diisi',
                ]
            ],
            'id_lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Presensi wajib diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi',
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
            'foto' => [
                'rules' => 'max_size[foto,10240]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Ukuran foto melebihi 10MB',
                    'mime_in' => 'Jenis file yang diizinkan hanya PNG, JPEG, dan JPEG',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Edit Data Siswa',
                'lokasi_select' => $this->lokasipresensi->findAll(),
                'kelas_select' => $this->kelas->orderBy('nama_kelas', 'asc')->findAll(),
                'siswa' => $this->siswa->editPegawai($id),
                'validation' => \Config\Services::validation(),
            ];

            echo view('admin/siswa/edit', $data);
        } else {
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $nama_foto = $this->request->getFile('foto_lama');
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move('images/users/', $nama_foto);
            }

            $this->siswa->update($id, [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_lokasi_presensi' => $this->request->getPost('id_lokasi_presensi'),
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_handphone' => $this->request->getPost('no_handphone'),
            ]);

            if ($this->request->getPost('password') == '') {
                $password = $this->request->getPost('password_lama');
            } else {
                $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            }

            $this->users->where('id_siswa', $id)
                ->set([
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => $password,
                    'status' => $this->request->getPost('status'),
                    'role' => $this->request->getPost('role'),
                    'foto' => $nama_foto,
                ])->update();

            session()->setFlashdata('message', 'Data siswa berhasil diupdate');

            return redirect()->route('siswa');
        }
    }

    public function delete($id)
    {
        $siswa = $this->siswa->find($id);

        if ($siswa) {
            $this->users->where('id_siswa', $id)->delete();
            $this->siswa->delete($id);

            session()->setFlashdata('message', 'Data siswa berhasil dihapus');

            return redirect()->route('siswa');
        }
    }
}
