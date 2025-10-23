<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateMenusTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['item', 'caption'],
                'default' => 'item',
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'position' => [
                'type' => 'INT',
                'constraint' => 3,
                'default' => 0,
            ],
            'menu_type' => [
                'type' => 'ENUM',
                'constraint' => ['admin','public'],
                'default' => 'public',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('parent_id','menus','id','CASCADE','CASCADE');
        $this->forge->createTable('menus');
    }
    public function down()
    {
        $this->forge->dropTable('menus');
    }
}
