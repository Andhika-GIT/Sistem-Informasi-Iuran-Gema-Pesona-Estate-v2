<?php

namespace App\Controllers;

use App\Models\IuranKeluarModel;

class IuranKeluar extends BaseController
{
    protected $iuran;
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->iuran = new IuranKeluarModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('tb_iuran_keluar');
    }

    public function index()
    {
        $data = [
            'iuran' => $this->iuran->getIuran()
            // 'total' => $this->iuran->getTotal()
        ];

        return view('iurankeluar/index', $data);
    }

    public function testID()
    {
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'k';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);
        dd($kodeIuran);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('iurankeluar/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'kode_iuran' => [
                'rules' => 'is_unique[tb_iuran_keluar.kode_iuran_keluar]',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, Masukkan kode yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/iurankeluar/add')->withInput();
        }
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'k';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);
        $this->iuran->save([
            'kode_iuran_keluar' => $kodeIuran,
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'metode_bayar' => $this->request->getVar('metode_bayar'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/iurankeluar');
    }

    public function hapus($id)
    {
        $this->iuran->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/iurankeluar');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'iuran' => $this->iuran->getIuran($id)
        ];
        return view('iurankeluar/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'kode_iuran' => [
                'rules' => 'is_unique[tb_iuran_keluar.kode_iuran_keluar,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, keluarkan kode yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/iurankeluar/edit/' . $this->request->getVar('id'))->withInput();
        }
        $this->iuran->save([
            'id' => $id,
            // 'kode_iuran_keluar' => $this->request->getVar('kode_iuran'),
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'metode_bayar' => $this->request->getVar('metode_bayar'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/iurankeluar');
    }

    public function export()
    {
        $data = [
            'judul' => 'Daftar Iuran keluar',
            'iuran' => $this->iuran->getIuran()
        ];

        return view('iurankeluar/export', $data);
    }
}
