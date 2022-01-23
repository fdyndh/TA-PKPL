<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table      = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $allowedFields = ['judul', 'gambar', 'keterangan', 'lokasi', 'tanggal'];
    protected $db, $builder;

    // public function __construct()
    // {
    // }

    public function fetchData()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->select('id_prestasi, gambar, judul, tanggal');

        return $this->builder->get();
    }

    public function updateData($id, $data)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_prestasi', $id);
        $this->builder->update($data);
    }

    public function deleteData($id)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_prestasi', $id);
        $this->builder->delete();
    }
}
