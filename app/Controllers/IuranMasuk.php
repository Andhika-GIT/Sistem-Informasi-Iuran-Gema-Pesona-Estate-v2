<?php

namespace App\Controllers;

use App\Models\IuranMasukModel;

class IuranMasuk extends BaseController
{
    protected $iuran;
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->iuran = new IuranMasukModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('tb_iuran_masuk');
    }

    public function index()
    {
        if (session()->get('role') == 'warga') {
            $nama = session()->get('nama');
            $data = [
                'iuran' => $this->iuran->where('nama', $nama)->findAll()
            ];
        } else {
            $data = [
                'iuran' => $this->iuran->getIuran()
                // 'total' => $this->iuran->getTotal()
            ];
        }

        return view('iuranmasuk/index', $data);
    }

    public function testID()
    {
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'M';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);
        dd($kodeIuran);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('iuranmasuk/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'kode_iuran' => [
                'rules' => 'is_unique[tb_iuran_masuk.kode_iuran_masuk]',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, masukkan kode yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/iuranmasuk/add')->withInput();
        }
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'M';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);

        $this->iuran->save([
            'kode_iuran_masuk' => $kodeIuran,
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'metode_bayar' => $this->request->getVar('metode_bayar'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/iuranmasuk');
    }

    public function hapus($id)
    {
        $this->iuran->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/iuranmasuk');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'iuran' => $this->iuran->getIuran($id)
        ];

        return view('iuranmasuk/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([

            'kode_iuran' => [
                'rules' => 'is_unique[tb_iuran_masuk.kode_iuran_masuk,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, masukkan kode yang lain'
                ]
            ]

        ])) {
            return redirect()->to('/iuranmasuk/edit/' . $this->request->getVar('id'))->withInput();
        }
        // jika sudah tervalidasi

        $this->iuran->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'metode_bayar' => $this->request->getVar('metode_bayar'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);

        session()->setFlashdata('pesan', 'data berhasil didiubah');

        return redirect()->to('/iuranmasuk');
    }

    public function export()
    {
        $data = [
            'judul' => 'Daftar Iuran Masuk',
            'iuran' => $this->iuran->getIuran()
        ];
        return view('iuranmasuk/export', $data);
    }
}
