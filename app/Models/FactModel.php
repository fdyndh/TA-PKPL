<?php

namespace App\Models;

use CodeIgniter\Model;

class FactModel extends Model
{
    protected $table      = 'funfact';
    protected $primaryKey = 'id_funfact';
    protected $allowedFields = ['nama', 'angka'];
}
