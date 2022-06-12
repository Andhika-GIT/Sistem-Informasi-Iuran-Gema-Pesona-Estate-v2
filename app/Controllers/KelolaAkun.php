<?php

namespace App\Controllers;

use App\Models\KelolaAkunModel;

class KelolaAkun extends BaseController
{
    protected $kelolaAkun;

    public function __construct()
    {
        $this->kelolaAkun = new KelolaAkunModel();
    }
    public function index()
    {
        $data = [
            'user' => $this->kelolaAkun->getUser()
        ];

        return view('kelola-akun/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('kelola-akun/add', $data);
    }
    public function simpan()
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
                'rules' => 'is_unique[tb_user.email]',
                'errors' => [
                    'is_unique' => 'email sudah terdaftar, silahkan masukkan email yang lain'
                ]
            ],
            'username' => [
                'rules' => 'is_unique[tb_user.username]',
                'errors' => [
                    'is_unique' => 'username sudah terdaftar, silahkan masukkan username yang lain'
                ]
            ],
            'password' => [
                'rules' => 'is_unique[tb_user.password]',
                'errors' => [
                    'is_unique' => 'password sudah terdaftar, silahkan masukkan password yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/kelola-akun/add')->withInput();
        }
        $fileSampul = $this->request->getFile('foto');
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            $namaSampul = $fileSampul->getName();
            $fileSampul->move('img/profile/');
        }
        $this->kelolaAkun->save([
            'id' => $this->request->getVar('id'),
            'foto' => $namaSampul,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no' => $this->request->getVar('no'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),

        ]);
        session()->setFlashdata('pesan', 'akun berhasil diperbaharui');
        return redirect()->to('/kelolaakun');
    }

    public function hapus($id)
    {

        $user = $this->kelolaAkun->find($id);

        // jika file gambar default
        if ($user['foto'] != 'default.png') {
            // hapus gambar
            unlink('img/profile/' . $user['foto']);
        }

        $this->kelolaAkun->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kelolaakun');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->kelolaAkun->getUser($id)

        ];

        return view('kelola-akun/edit', $data);
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
            'username' => [
                'rules' => 'is_unique[tb_user.username,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'username sudah terdaftar, silahkan masukkan username yang lain'
                ]
            ],
            'password' => [
                'rules' => 'is_unique[tb_user.password,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'password sudah terdaftar, silahkan masukkan password yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/kelola-akun/edit/' .  $this->request->getVar('id'))->withInput();
        }
        $fileSampul = $this->request->getFile('foto');

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getName();
            $fileSampul->move('img/profile/', $namaSampul);
            unlink('img/profile/' . $this->request->getVar('sampulLama'));
        }
        $this->kelolaAkun->save([
            'id' => $this->request->getVar('id'),
            'foto' => $namaSampul,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no' => $this->request->getVar('no'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),

        ]);
        session()->setFlashdata('pesan', 'akun berhasil diperbaharui');
        return redirect()->to('/kelolaakun');
    }
}
