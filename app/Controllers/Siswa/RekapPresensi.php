<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\PresensiModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RekapPresensi extends BaseController
{
    protected $helpers = ['CIFunctions'];
    protected $presensi;

    public function __construct()
    {
        $this->presensi = new PresensiModel();
    }

    public function index()
    {
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            if (isset($_GET['export'])) {
                $rekap_presensi = $this->presensi->rekapPresensiSiswaFilter($tanggal_awal, $tanggal_akhir);
                $spreadsheet = new Spreadsheet();
                $activeWorksheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->mergeCells('A1:C1');
                $spreadsheet->getActiveSheet()->mergeCells('A3:B3');
                $spreadsheet->getActiveSheet()->mergeCells('A3:E1');

                $activeWorksheet->setCellValue('A1', 'REKAP PRESENSI HARIAN');
                $activeWorksheet->setCellValue('A3', 'TANGGAL');
                $tanggalrekap = $tanggal_awal . 's/d' . $tanggal_akhir;
                $activeWorksheet->setCellValue('C3', $tanggalrekap);

                $activeWorksheet->setCellValue('A4', 'NO');
                $activeWorksheet->setCellValue('B4', 'NAMA SISWA');
                $activeWorksheet->setCellValue('C4', 'TANGGAL MASUK');
                $activeWorksheet->setCellValue('D4', 'JAM MASUK');
                $activeWorksheet->setCellValue('E4', 'TANGGAL KELUAR');
                $activeWorksheet->setCellValue('A4', 'JAM KELUAR');
                $activeWorksheet->setCellValue('A4', 'TOTAL JAM KERJA');
                $activeWorksheet->setCellValue('A4', 'TOTAL TERLAMBAT');

                $rows = 5;
                $no = 1;

                foreach ($rekap_presensi as $rekap) {
                    $timestamp_jam_masuk = strtotime($rekap->tanggal_masuk . $rekap->jam_masuk);
                    $timestamp_jam_keluar = strtotime($rekap->tanggal_keluar . $rekap->jam_keluar);
                    $selisih = $timestamp_jam_masuk - $timestamp_jam_keluar;
                    $jam = floor($selisih / 3600);
                    $selisih -= $jam * 3600;
                    $menit = floor($selisih / 60);

                    $jam_masuk_real = strtotime($rekap->jam_masuk);
                    $jam_masuk_kantor = strtotime($rekap->jam_masuk_kantor);
                    $selisih_terlambat = $jam_masuk_real - $jam_masuk_kantor;
                    $jam_terlambat = floor($selisih_terlambat / 3600);
                    $selisih_terlambat -= $jam_terlambat * 3600;
                    $menit_terlambat = floor($selisih_terlambat / 60);

                    $activeWorksheet->setCellValue('A' . $rows, $no++);
                    $activeWorksheet->setCellValue('A' . $rows, $rekap->nama_siswa);
                    $activeWorksheet->setCellValue('A' . $rows, $rekap->tanggal_masuk);
                    $activeWorksheet->setCellValue('A' . $rows, $rekap->jam_masuk);
                    $activeWorksheet->setCellValue('A' . $rows, $rekap->tanggal_keluar);
                    $activeWorksheet->setCellValue('A' . $rows, $rekap->jam_keluar);
                    $activeWorksheet->setCellValue('A' . $rows, $jam . ' Jam ' . $menit . ' menit');
                    $activeWorksheet->setCellValue('A' . $rows, $jam_terlambat . ' Jam ' . $menit_terlambat . ' menit');

                    $rows++;
                }

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                $userdata = session()->get('userdata');
                $nama_siswa = $userdata->nama_siswa;
                header('Content-Disposition: attachment;filename="rekap-presensi-' . $nama_siswa . '_' . $tanggal_awal . '-' . $tanggal_akhir . '.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            } else {
                $rekap_presensi = $this->presensi->rekapPresensiSiswaFilter($tanggal_awal, $tanggal_akhir);
            }
        } else {
            $rekap_presensi = $this->presensi->rekapPresensiSiswa();
        }

        $data = [
            'title' => 'Rekap Presensi',
            'rekap_presensis' => $rekap_presensi,
        ];

        return view('siswa/rekappresensi/index', $data);
    }
}
