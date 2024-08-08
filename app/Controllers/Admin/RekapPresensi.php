<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PresensiModel;
use CodeIgniter\HTTP\ResponseInterface;

class RekapPresensi extends BaseController
{
    protected $presensi;

    public function __construct()
    {
        $this->presensi = new PresensiModel();
    }

    public function rekap_harian()
    {
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $rekap_harian = $this->presensi->rekapHarianFilter($tanggal_awal, $tanggal_akhir);
        } else {
            $rekap_harian = $this->presensi->rekapHarian();
        }

        $data = [
            'title' => 'Rekap Harian',
            'rekap_harians' => $rekap_harian
        ];

        return view('admin/rekappresensi/rekap_harian', $data);
    }

    public function rekap_bulanan()
    {
        $filter_bulan = $this->request->getVar('filter_bulan');
        $filter_tahun = $this->request->getVar('filter_tahun');

        if ($filter_bulan) {
            $rekap_bulanan = $this->presensi->rekapBulananFilter($filter_bulan, $filter_tahun);
        } else {
            $rekap_bulanan = $this->presensi->rekapBulanan();
        }

        $data = [
            'title' => 'Rekap Bulanan',
            'rekap_bulanans' => $rekap_bulanan
        ];

        return view('admin/rekappresensi/rekap_bulanan', $data);
    }
}
