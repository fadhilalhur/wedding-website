<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateDoctorSchedulesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'doctor_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'day' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'start_time' => [
                'type' => 'TIME',
            ],
            'end_time' => [
                'type' => 'TIME',
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
        $this->forge->addForeignKey('doctor_id','doctors','id','CASCADE','CASCADE');
        $this->forge->createTable('doctor_schedules');
    }
    public function down()
    {
        $this->forge->dropTable('doctor_schedules');
    }
}
