<?php

namespace App\Models;

use CodeIgniter\Model;

class IuranMasukModel extends Model
{
    protected $table = 'tb_iuran_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_iuran_masuk', 'nama', 'tanggal', 'keterangan', 'metode_bayar', 'jumlah'];

    public function getIuran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
