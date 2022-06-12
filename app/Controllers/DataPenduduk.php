<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class DataPenduduk extends BaseController
{
    protected $penduduk;

    public function __construct()
    {
        $this->penduduk = new PendudukModel();
    }
    public function index()
    {
        $data = [
            'penduduk' => $this->penduduk->getPenduduk()
        ];

        return view('datapenduduk/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('datapenduduk/add', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'max_length[16]|is_unique[tb_penduduk.nik_penduduk]',
                'errors' => [
                    'is_unique' => 'no nik sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 16 angka'
                ]
            ],
            'kk' => [
                'rules' => 'max_length[16]|is_unique[tb_penduduk.kk_penduduk]',
                'errors' => [
                    'is_unique' => 'no kk sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 16 angka'
                ]
            ],
            'tlp' => [
                'rules' => 'max_length[13]|is_unique[tb_penduduk.no_penduduk]',
                'errors' => [
                    'is_unique' => 'no telepon sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 13 angka'
                ]
            ]
        ])) {
            return redirect()->to('/datapenduduk/add')->withInput();
        }
        $this->penduduk->save([
            'nama_penduduk' => $this->request->getVar('nama'),
            'agama' => $this->request->getVar('agama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat_penduduk' => $this->request->getVar('alamat'),
            'rt_penduduk' => $this->request->getVar('rt'),
            'no_penduduk' => $this->request->getVar('tlp'),
            'nik_penduduk' => $this->request->getVar('nik'),
            'kk_penduduk' => $this->request->getVar('kk')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/datapenduduk');
    }

    public function hapus($id)
    {
        $this->penduduk->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/datapenduduk');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'penduduk' => $this->penduduk->getPenduduk($id)
        ];

        return view('datapenduduk/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'max_length[16]|is_unique[tb_penduduk.nik_penduduk,id_penduduk,' . $id . ']',
                'errors' => [
                    'is_unique' => 'no nik sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 16 angka'
                ]
            ],
            'kk' => [
                'rules' => 'max_length[16]|is_unique[tb_penduduk.kk_penduduk,id_penduduk,' . $id . ']',
                'errors' => [
                    'is_unique' => 'no kk sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 16 angka'
                ]
            ],
            'tlp' => [
                'rules' => 'max_length[13]|is_unique[tb_penduduk.no_penduduk,id_penduduk,' . $id . ']',
                'errors' => [
                    'is_unique' => 'no telepon sudah terdaftar',
                    'max_length' => 'no tidak boleh lebih dari 13 angka'
                ]
            ]
        ])) {
            return redirect()->to('/datapenduduk/edit/' . $this->request->getVar('id'))->withInput();
        }
        $this->penduduk->save([
            'id_penduduk' => $id,
            'nama_penduduk' => $this->request->getVar('nama'),
            'agama' => $this->request->getVar('agama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat_penduduk' => $this->request->getVar('alamat'),
            'rt_penduduk' => $this->request->getVar('rt'),
            'no_penduduk' => $this->request->getVar('tlp'),
            'nik_penduduk' => $this->request->getVar('nik'),
            'kk_penduduk' => $this->request->getVar('kk')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/datapenduduk');
    }

    public function export()
    {
        $data = [
            'judul' => 'Daftar Penduduk',
            'penduduk' => $this->penduduk->getPenduduk()
        ];

        return view('datapenduduk/export', $data);
    }
}
