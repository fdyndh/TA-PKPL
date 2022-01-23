<?php

namespace App\Models;

use CodeIgniter\Model;

class SambutanModel extends Model
{
    protected $table      = 'sambutan';
    protected $primaryKey = 'id_sambutan';
    protected $allowedFields = ['kata_sambutan', 'gambar', 'lokasi', 'nama_kepsek'];
}
