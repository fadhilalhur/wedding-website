<?php

namespace App\Models;

use CodeIgniter\Model;

class SpesialisModel extends Model
{
    protected $table      = 'spesialis_master';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'deskripsi', 'photo'];
    protected $useTimestamps = true;
}
