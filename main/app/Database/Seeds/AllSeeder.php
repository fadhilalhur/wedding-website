<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('MenuSeeder');
        $this->call('NewsSeeder');
        $this->call('DoctorSeeder');
        $this->call('DoctorScheduleSeeder');
        $this->call('CompanySeeder');
        $this->call('PagesSeeder');
        $this->call('SchedulesSeeder');
    }
}
