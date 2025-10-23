<?php
namespace App\Models;
use CodeIgniter\Model;

class KategoriPagesModel extends Model
{
    protected $table = 'kategori_pages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_kategori',
        'gambar',
        
        'slug_kategori'
    ];
}