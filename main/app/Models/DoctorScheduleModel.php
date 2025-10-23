<?php
namespace App\Models;
use CodeIgniter\Model;
class DoctorScheduleModel extends Model
{
    protected $table = 'doctor_schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = ['doctor_id', 'day', 'start_time', 'end_time', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
