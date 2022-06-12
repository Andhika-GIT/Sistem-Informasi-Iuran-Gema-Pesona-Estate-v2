<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanAkunModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['foto', 'nama', 'email', 'no', 'username', 'password', 'role'];

    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
