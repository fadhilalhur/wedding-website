<?php
namespace App\Models;
use CodeIgniter\Model;
class MenuModel extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'url', 'parent_id', 'position', 'type', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
