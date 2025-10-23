<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'slug', 'content', 'featured_image', 'published_at',
        'meta_title', 'meta_description', 'meta_keywords', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
