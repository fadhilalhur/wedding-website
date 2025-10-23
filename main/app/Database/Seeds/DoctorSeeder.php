<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class DoctorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'dr. Andi Wijaya',
                'specialization' => 'Penyakit Dalam',
                'photo' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'dr. Siti Rahma',
                'specialization' => 'Anak',
                'photo' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('doctors')->insertBatch($data);
    }
}
