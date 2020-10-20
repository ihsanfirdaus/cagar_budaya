<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelFotoModel extends Model
{
    protected $table = 'artikel_foto';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_artikel', 'foto'];
}
