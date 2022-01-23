<?php

namespace App\Models;

use CodeIgniter\Model;

class SejarahModel extends Model
{
    protected $table      = 'sejarah';
    protected $primaryKey = 'id_sejarah';
    protected $allowedFields = ['keterangan', 'visi', 'misi'];
}
