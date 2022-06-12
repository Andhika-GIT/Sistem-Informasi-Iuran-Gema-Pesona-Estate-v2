<?php

namespace App\Models;

use CodeIgniter\Model;

class ThreadModel extends Model
{
    protected $table = 'thread';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'isi', 'file', 'kategori', 'nama'];

    public function getThread($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
