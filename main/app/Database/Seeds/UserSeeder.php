<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@localhost',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'name' => 'Administrator',
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        // Cek apakah user admin sudah ada
        $exists = $this->db->table('users')->getWhere(['username' => 'admin'])->getRow();
        if (!$exists) {
            $this->db->table('users')->insertBatch($data);
        }

    }
}
