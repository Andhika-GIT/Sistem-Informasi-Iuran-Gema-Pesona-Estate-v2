<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Role implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Sebelum Masuk ke semua controller

        if (session()->get('role') == 'admin') {
            return redirect()->to(site_url('admin/index'));
        } else if (session()->get('role') == 'bendahara') {
            return redirect()->to(site_url('dashboard/index'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
