<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KetidakhadiranModel;
use App\Models\PresensiModel;
use App\Models\SiswaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $siswa;
    protected $presensi;
    protected $ketidakhadiran;

    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->presensi = new PresensiModel();
        $this->ketidakhadiran = new KetidakhadiranModel();
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'title' => 'Dashboard',
            'total_siswa' => $this->siswa->countAllResults(),
            'total_hadir' => $this->presensi->where('tanggal_masuk', date('Y-m-d'))->countAllResults(),
            'total_ketidakhadiran' => $this->ketidakhadiran->where('tanggal', date('Y-m-d'))->countAllResults(),
            'riwayat_presensi' => $this->presensi->riwayatPresensi(),
            'presensi' => $this->presensi->select('tanggal_masuk'),
        ];

        return view('admin/home', $data);
    }
}
