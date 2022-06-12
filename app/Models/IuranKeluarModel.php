<?php

namespace App\Models;

use CodeIgniter\Model;

class IuranKeluarModel extends Model
{
    protected $table = 'tb_iuran_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_iuran_keluar', 'nama', 'tanggal', 'keterangan', 'metode_bayar', 'jumlah'];

    // public function __construct()
    // {
    //     $this->db = db_connect();
    // }

    public function getIuran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    // public function getTotal()
    // {
    //     $builder = $this->db->table('tb_iuran_masuk');
    //     $query = $builder->selectSum('jumlah');
    //     return $query;
    // }
}
