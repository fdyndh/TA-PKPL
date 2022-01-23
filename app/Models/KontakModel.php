<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table      = 'kontak';
    protected $primaryKey = 'id_kontak';
    protected $allowedFields = ['alamat', 'jam_open', 'mail', 'telepon'];
}
