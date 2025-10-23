<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'kategori_id',
        'created_at',
        'updated_at',
        'gambar'
    ];
    protected $useTimestamps = true;
}
