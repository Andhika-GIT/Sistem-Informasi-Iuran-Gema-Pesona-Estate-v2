<?php

namespace App\Controllers;

use App\Models\KelolaAkunModel;

class PengaturanAkun extends BaseController
{
    protected $admin;

    public function __construct()
    {
        $this->admin = new KelolaAkunModel();
    }

    public function index()
    {
        $id = session()->get('id');
        $data = [
            'admin' => $this->admin->getUser($id)
        ];

        return view('pengaturanakun/index', $data);
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'admin' => $this->admin->getUser($id)
        ];

        return view('pengaturanakun/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,9024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'email' => [
                'rules' => 'is_unique[tb_user.email,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'email sudah terdaftar, silahkan masukkan email yang lain'
                ]
            ],
            'no' => [
                'rules' => 'is_unique[tb_user.no,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'no hp sudah terdaftar, silahkan masukkan no yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/pengaturanakun/' .  $this->request->getVar('id'))->withInput();
        }
        $fileSampul = $this->request->getFile('foto');
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $fileSampul->move('img/admin/');
            $namaSampul = $fileSampul->getName();
            unlink('img/profile/' . $this->request->getVar('sampulLama'));
        }
        $this->admin->save([
            'id' => $this->request->getVar('id'),
            'foto' => $namaSampul,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no' => $this->request->getVar('no'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);
        session()->setFlashdata('pesan', 'akun berhasil diperbaharui');
        return redirect()->to('/pengaturanakun');
    }
}
