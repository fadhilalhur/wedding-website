<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class NewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Rumah Sakit Meluncurkan Layanan Baru',
                'slug' => 'rs-luncurkan-layanan-baru',
                'content' => 'Rumah sakit kini menyediakan layanan rawat jalan terbaru untuk pasien.',
                'featured_image' => null,
                'published_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'meta_title' => null,
                'meta_description' => null,
                'meta_keywords' => null,
            ],
            [
                'title' => 'Pendaftaran Dokter Spesialis',
                'slug' => 'pendaftaran-dokter-spesialis',
                'content' => 'Kini tersedia pendaftaran dokter spesialis secara online.',
                'featured_image' => null,
                'published_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'meta_title' => null,
                'meta_description' => null,
                'meta_keywords' => null,
            ],
        ];
        // Insert hanya jika slug belum ada
        foreach ($data as $row) {
            $exists = $this->db->table('news')->getWhere(['slug' => $row['slug']])->getRow();
            if (!$exists) {
                $this->db->table('news')->insert($row);
            }
        }
    }
}
