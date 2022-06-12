<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Dashboard extends BaseController
{
    protected $penduduk;
    public function index()
    {
        $this->penduduk = new PendudukModel();

        $no = session()->get('no');

        $hasil = $this->penduduk->where('no_penduduk', $no)->first();

        $data = [
            'penduduk' => $hasil
        ];


        return view('dashboard/index', $data);
    }
}
