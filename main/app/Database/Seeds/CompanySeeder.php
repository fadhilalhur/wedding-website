<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'RS Mitra Husada',
            'logo' => 'uploads/logo.png',
            'address' => 'Jl. Contoh Alamat No.1, Kota Contoh',
            'phone' => '021-12345678',
            'maps_location' => 'https://maps.google.com/?q=-6.200000,106.816666',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('company')->insert($data);
    }
}
