<?php

namespace App\Controllers\Admin;

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
        $data = [
            'title' => 'Ketidakhadiran',
            'ketidakhadiran_all' => $this->ketidakhadiran->findAll()
        ];

        return view('admin/ketidakhadiran/index', $data);
    }

    public function approvedKetidakhadiran($id)
    {
        dd($id);
        $this->ketidakhadiran->update($id, [
            'status' => 'Approved',
        ]);

        session()->setFlashdata('message', 'Status pengajuan berhasil disetujui');

        return redirect()->route('ketidakhadiran');
    }
}
