<?php

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'reply';
    protected $primaryKey = 'id';
    // menentukan field mana saja yang boleh di isi
    protected $allowedFields = ['id_thread', 'id_user', 'isi'];


    public function getReply($id = false)
    {
        // jika $id nya tidak ada atau false
        if ($id == false) {
            // akan menampilkan semua penduduk
            return $this->findAll();
        }

        // jika $idada, maka akan menampilkan satu data dari id atau detail yang dipilih
        return $this->where(['id' => $id])->first();
    }
}
