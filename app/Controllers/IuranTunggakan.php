<?php

namespace App\Controllers;

use App\Models\IuranTunggakanModel;

class IuranTunggakan extends BaseController
{
    protected $iuran;
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->iuran = new IuranTunggakanModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('iuran_tunggakan');
    }

    public function index()
    {
        $data = [
            'iuran' => $this->iuran->getIuran()
        ];

        return view('iurantunggakan/index', $data);
    }
    public function testID()
    {
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'H';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);
        dd($kodeIuran);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('iurantunggakan/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'kode_tagihan' => [
                'rules' => 'is_unique[iuran_tunggakan.kode_tagihan]',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, Masukkan kode yang lain'
                ]
            ]

        ])) {
            return redirect()->to('/iurantunggakan/add')->withInput();
        }
        $this->builder->selectMax('id');
        $query = $this->builder->get();
        $maxid = $query->getRowArray();
        $code = $maxid['id'];
        $noUrut = (int) substr($code, -4, 4);
        $noUrut++;
        $ket = 'H';
        $kodeIuran = $ket . sprintf("%06s", $noUrut);
        $this->iuran->save([
            'kode_tagihan' => $kodeIuran,
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/iurantunggakan');
    }

    public function hapus($id)
    {
        $this->iuran->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/iurantunggakan');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'iuran' => $this->iuran->getIuran($id)
        ];
        return view('iurantunggakan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'kode_tagihan' => [
                'rules' => 'is_unique[iuran_tunggakan.kode_tagihan,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'kode ini sudah terdaftar, Masukkan kode yang lain'
                ]
            ]
        ])) {
            return redirect()->to('/iurantunggakan/edit/' .  $this->request->getVar('id'))->withInput();
        }
        $this->iuran->save([
            'id' => $id,
            // 'kode_tagihan' => $this->request->getVar('kode_tagihan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/iurantunggakan');
    }

    public function export()
    {
        $data = [
            'judul' => 'Daftar Iuran Tunggakan',
            'iuran' => $this->iuran->getIuran()
        ];

        return view('iurantunggakan/export', $data);
    }
}
