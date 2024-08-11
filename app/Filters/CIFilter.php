<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;

class CIFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($arguments[0] == 'guest') {
            if (CIAuth::check()) {
                return redirect()->route('admin.home');
            }
        }

        if ($arguments[0] == 'auth') {
            if (!CIAuth::check()) {
                return redirect()->route('admin.login.form')->with('fail', 'Anda harus login terlebih dahulu');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
