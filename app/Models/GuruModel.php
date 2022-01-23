<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = ['gambar', 'nama', 'jabatan'];

    public function fetchData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('id_guru, gambar, nama, jabatan');
        return $builder->get();
    }

    public function deleteData($id)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_guru', $id);
        $this->builder->delete();
    }
}
