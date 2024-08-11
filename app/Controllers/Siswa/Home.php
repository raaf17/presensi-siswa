<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\LokasiPresensiModel;
use App\Models\SiswaModel;
use App\Models\PresensiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $lokasipresensi;
    protected $siswa;
    protected $presensi;

    public function __construct()
    {
        $this->lokasipresensi = new LokasiPresensiModel();
        $this->siswa = new SiswaModel();
        $this->presensi = new PresensiModel();
    }

    public function index()
    {
        $userdata = session()->get('userdata');
        $id_siswa = $userdata->id_siswa;
        $siswa = $this->siswa->where('id', $id_siswa)->first();
        $data = [
            'title' => 'Dashboard',
            'lokasipresensi' => $this->lokasipresensi->where('id', $siswa->id_lokasi_presensi)->first(),
            'cek_presensi' => $this->presensi->where('id_siswa', $id_siswa)->where('tanggal_masuk', date('Y-m-d'))->countAllResults(),
            'cek_presensi_keluar' => $this->presensi->where('id_siswa', $id_siswa)->where('tanggal_masuk', date('Y-m-d'))->where('tanggal_keluar IS NOT NULL')->where('tanggal_keluar !=', 0000 - 00 - 00)->countAllResults(),
            'ambil_presensi_masuk' => $this->presensi->where('id_siswa', $id_siswa)->where('tanggal_masuk', date('Y-m-d'))->first(),
        ];

        return view('siswa/home', $data);
    }

    public function presensiMasuk()
    {
        $latitude_pegawai = (float) $this->request->getPost('latitude_pegawai');
        $latitude_kantor = (float) $this->request->getPost('latitude_kantor');
        $radius = $this->request->getPost('radius');
        $jarak = sin(deg2rad($latitude_pegawai)) * sin(deg2rad($latitude_kantor)) + cos(deg2rad($latitude_pegawai)) * cos(deg2rad($latitude_kantor));
        $jarak = acos($jarak);
        $jarak = rad2deg($jarak);
        $mil = $jarak * 60 * 1.1515;
        $km = $mil * 1.609344;
        $jarak_meter = floor($km * 1000);

        if ($jarak_meter > $radius) {
            session()->setFlashdata('message', 'Presensi masuk gagal, Anda berada di luar radius lokasi');

            return redirect()->route('siswa.home');
        } else {
            $data = [
                'title' => 'Ambil Foto Selfie',
                'id_siswa' => $this->request->getPost('id_siswa'),
                'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                'jam_masuk' => $this->request->getPost('jam_masuk'),
            ];

            return view('siswa/ambilfotomasuk', $data);
        }
    }

    public function presensiMasukAksi()
    {
        $request = \Config\Services::request();

        $id_siswa = $request->getPost('id_siswa');
        $tanggal_masuk = $request->getPost('tanggal_masuk');
        $jam_masuk = $request->getPost('jam_masuk');
        $foto_masuk = $request->getPost('foto_masuk');

        $foto_masuk = str_replace('data:image/jpeg;base64,', '', $foto_masuk);
        $foto_masuk = base64_decode($foto_masuk);
        $foto_dir = 'images/uploads/' . $id_siswa . '_' . time() . '.jpg';
        $nama_foto = $id_siswa . '_' . time() . '.jpg';
        file_put_contents($foto_dir, $foto_masuk);

        $this->presensi->insert([
            'id_siswa' => $id_siswa,
            'tanggal_masuk' => $tanggal_masuk,
            'jam_masuk' => $jam_masuk,
            'foto_masuk' => $nama_foto,
        ]);

        session()->setFlashdata('message', 'Presensi masuk berhasil');

        return redirect()->route('siswa.home');
    }

    public function presensiKeluar($id)
    {
        $latitude_pegawai = (float) $this->request->getPost('latitude_pegawai');
        $latitude_kantor = (float) $this->request->getPost('latitude_kantor');
        $radius = $this->request->getPost('radius');
        $jarak = sin(deg2rad($latitude_pegawai)) * sin(deg2rad($latitude_kantor)) + cos(deg2rad($latitude_pegawai)) * cos(deg2rad($latitude_kantor));
        $jarak = acos($jarak);
        $jarak = rad2deg($jarak);
        $mil = $jarak * 60 * 1.1515;
        $km = $mil * 1.609344;
        $jarak_meter = floor($km * 1000);

        if ($jarak_meter > $radius) {
            session()->setFlashdata('message', 'Presensi keluar gagal, Anda berada di luar radius lokasi');

            return redirect()->route('siswa.home');
        } else {
            $data = [
                'title' => 'Ambil Foto Selfie',
                'id_presensi' => $id,
                'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
                'jam_keluar' => $this->request->getPost('jam_keluar'),
            ];

            return view('siswa/ambilfotokeluar', $data);
        }
    }

    public function presensiKeluarAksi($id)
    {
        $request = \Config\Services::request();

        $tanggal_keluar = $request->getPost('tanggal_keluar');
        $jam_keluar = $request->getPost('jam_keluar');
        $foto_keluar = $request->getPost('foto_keluar');
        $foto_keluar = str_replace('data:image/jpeg;base64,', '', $foto_keluar);
        $foto_keluar = base64_decode($foto_keluar);
        $foto_dir = 'images/uploads/' . $id . '_' . time() . '.jpg';
        $nama_foto = $id . '_' . time() . '.jpg';
        file_put_contents($foto_dir, $foto_keluar);

        $this->presensi->update($id, [
            'tanggal_keluar' => $tanggal_keluar,
            'jam_keluar' => $jam_keluar,
            'foto_keluar' => $nama_foto,
        ]);

        session()->setFlashdata('message', 'Presensi keluar berhasil');

        return redirect()->route('siswa.home');
    }
}
