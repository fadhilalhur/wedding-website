<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMetaFieldsToNews extends Migration
{
    public function up()
    {
        // rename `image` to `featured_image` if column exists
        if ($this->db->fieldExists('image', 'news')) {
            $this->forge->modifyColumn('news', [
                'image' => [
                    'name'       => 'featured_image',
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
            ]);
        }

        // add meta columns if they don't exist
        $fields = [];
        if (!$this->db->fieldExists('meta_title', 'news')) {
            $fields['meta_title'] = [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ];
        }
        if (!$this->db->fieldExists('meta_description', 'news')) {
            $fields['meta_description'] = [
                'type' => 'TEXT',
                'null' => true,
            ];
        }
        if (!$this->db->fieldExists('meta_keywords', 'news')) {
            $fields['meta_keywords'] = [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ];
        }
        if (!empty($fields)) {
            $this->forge->addColumn('news', $fields);
        }
    }

    public function down()
    {
        // Only drop columns if they exist
        if ($this->db->fieldExists('meta_title', 'news')) {
            $this->forge->dropColumn('news', 'meta_title');
        }
        if ($this->db->fieldExists('meta_description', 'news')) {
            $this->forge->dropColumn('news', 'meta_description');
        }
        if ($this->db->fieldExists('meta_keywords', 'news')) {
            $this->forge->dropColumn('news', 'meta_keywords');
        }
        if ($this->db->fieldExists('featured_image', 'news')) {
            $this->forge->modifyColumn('news', [
                'featured_image' => [
                    'name'       => 'image',
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
            ]);
        }
    }
}
