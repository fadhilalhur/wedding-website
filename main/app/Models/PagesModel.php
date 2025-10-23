<?php
namespace App\Models;
use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'kategori_id',
        'gambar',
        'link_yt',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}