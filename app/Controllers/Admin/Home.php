<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $pegawai;

    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'total_pegawai' => $this->pegawai->countAllResults()
        ];

        return view('admin/home', $data);
    }
}
