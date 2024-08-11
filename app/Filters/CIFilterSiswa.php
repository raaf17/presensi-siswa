<?php

namespace App\Filters;

use App\Libraries\CIAuth;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CIFilterSiswa implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!CIAuth::check()) {
            session()->setFlashdata('message', 'Anda belum login');

            return redirect()->route('login.form');
        }

        if (session()->get('role_id' != 'Siswa')) {
            session()->setFlashdata('message', 'Anda belum login');

            return redirect()->route('login.form');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
