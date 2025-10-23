<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class DoctorScheduleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'doctor_id' => 1,
                'day' => 'Senin',
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'doctor_id' => 2,
                'day' => 'Selasa',
                'start_time' => '09:00:00',
                'end_time' => '13:00:00',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('doctor_schedules')->insertBatch($data);
    }
}
