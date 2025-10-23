<?php
namespace App\Models;
use CodeIgniter\Model;
class DoctorModel extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'specialization','poli', 'photo', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
