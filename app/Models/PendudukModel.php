<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table = 'tb_penduduk';
    protected $primaryKey = 'id_penduduk';
    protected $allowedFields = ['nama_penduduk', 'agama', 'jenis_kelamin', 'alamat_penduduk', 'rt_penduduk', 'no_penduduk', 'nik_penduduk', 'kk_penduduk'];

    public function getPenduduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_penduduk' => $id])->first();
    }
}
