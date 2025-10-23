<?php

namespace App\Models;

use CodeIgniter\Model;

class AsuransiModel extends Model
{
    protected $table = 'asuransi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'logo', 'deskripsi', 'created_at', 'updated_at'];
}
