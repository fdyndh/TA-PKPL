<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table      = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = ['gambar', 'keterangan'];
    protected $db, $builder;

    public function fetchData()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->select('id_galeri, gambar, keterangan');

        return $this->builder->get();
    }

    public function updateData($id, $data)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_galeri', $id);
        $this->builder->update($data);
    }

    public function deleteData($id)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_galeri', $id);
        $this->builder->delete();
    }
}
