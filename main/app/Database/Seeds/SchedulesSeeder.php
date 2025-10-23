<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchedulesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'doctor_id'   => 1,
                'date'       => '2025-06-10',
                'time'       => '08:00:00',
                'description'=> 'Praktek Pagi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'doctor_id'   => 1,
                'date'       => '2025-06-10',
                'time'       => '13:00:00',
                'description'=> 'Praktek Siang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $db = \Config\Database::connect();
        $db->table('schedules')->insertBatch($data);
    }
}
