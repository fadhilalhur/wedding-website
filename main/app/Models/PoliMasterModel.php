<?php

namespace App\Models;

use CodeIgniter\Model;

class PoliMasterModel extends Model
{
    protected $table = 'poli_master';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'deskripsi', 'photo', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
