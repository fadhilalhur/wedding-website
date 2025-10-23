<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'   => 'Tentang Kami',
                'slug'    => 'tentang-kami',
                'content' => '<p>Ini adalah halaman tentang kami.</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'   => 'Kontak',
                'slug'    => 'kontak',
                'content' => '<p>Ini adalah halaman kontak.</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $db = \Config\Database::connect();
        foreach ($data as $row) {
            $exists = $db->table('pages')->getWhere(['slug' => $row['slug']])->getRow();
            if (!$exists) {
                $db->table('pages')->insert($row);
            }
        }
    }
}
