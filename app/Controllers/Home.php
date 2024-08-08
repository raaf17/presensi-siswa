<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('admin/home', $data);
    }
}
