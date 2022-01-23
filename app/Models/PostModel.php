<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['gambar', 'judul', 'isi', 'tanggal', 'kategori'];
    protected $db1, $builder1;

    public function fetchData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->select('id_post, gambar, judul, kategori');

        return $builder->get();
    }

    public function deleteData($id)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_post', $id);
        $this->builder->delete();
    }

    public function whereData($x)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->where('kategori', $x);
        return $this->builder->get();
    }

    public function otherPost($id)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
        $this->builder->whereNotIn('id_post', [$id]);
        return $this->builder->get();
    }
}
