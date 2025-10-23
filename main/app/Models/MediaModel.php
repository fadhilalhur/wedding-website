<?php
namespace App\Models;
use CodeIgniter\Model;
class MediaModel extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file_name', 'file_path', 'uploaded_at'];
    protected $useTimestamps = false;
}
