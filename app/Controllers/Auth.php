<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        session();
        return view('auth/login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->authModel->login($username, $password);

        if ($cek) {
            // jika data sesuai
            session()->set('login', true);
            session()->set('id', $cek['id']);
            session()->set('nama', $cek['nama']);
            session()->set('email', $cek['email']);
            session()->set('no', $cek['no']);
            session()->set('username', $cek['username']);
            session()->set('password', $cek['password']);
            session()->set('foto', $cek['foto']);
            session()->set('role', $cek['role']);

            return redirect()->to(base_url('dashboard'));
        } else {
            // jika data tidak sesuai
            session()->setFlashdata('errors', 'Username atau Password Salah');
            return redirect()->to('/auth/index');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('no');
        session()->remove('username');
        session()->remove('password');
        session()->remove('foto');
        session()->remove('role');
        session()->destroy();
        return redirect()->to('/auth');
    }
}
