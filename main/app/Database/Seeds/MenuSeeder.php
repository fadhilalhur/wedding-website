<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            // Admin Sidebar ala CMS Website/WordPress
            [
                'title' => 'Dashboard',
                'url' => 'admin',
                'icon' => 'ti ti-dashboard',
                'type' => 'item',
                'parent_id' => null,
                'position' => 1,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Posts',
                'url' => 'admin/news',
                'icon' => 'ti ti-news',
                'type' => 'item',
                'parent_id' => null,
                'position' => 2,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Media',
                'url' => 'admin/media',
                'icon' => 'ti ti-photo',
                'type' => 'item',
                'parent_id' => null,
                'position' => 3,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Pages',
                'url' => 'admin/pages',
                'icon' => 'ti ti-file',
                'type' => 'item',
                'parent_id' => null,
                'position' => 4,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Doctors',
                'url' => 'admin/doctors',
                'icon' => 'ti ti-user',
                'type' => 'item',
                'parent_id' => null,
                'position' => 5,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Schedules',
                'url' => 'admin/schedules',
                'icon' => 'ti ti-calendar',
                'type' => 'item',
                'parent_id' => null,
                'position' => 6,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Users',
                'url' => 'admin/users',
                'icon' => 'ti ti-user-plus',
                'type' => 'item',
                'parent_id' => null,
                'position' => 7,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Settings',
                'url' => 'admin/company',
                'icon' => 'ti ti-settings',
                'type' => 'item',
                'parent_id' => null,
                'position' => 8,
                'menu_type' => 'admin',
            ],
            [
                'title' => 'Logout',
                'url' => 'logout',
                'icon' => 'ti ti-logout',
                'type' => 'item',
                'parent_id' => null,
                'position' => 9,
                'menu_type' => 'admin',
            ],
            // Public Menu
            [
                'title' => 'Home',
                'url' => '/',
                'icon' => 'ti ti-home',
                'type' => 'item',
                'parent_id' => null,
                'position' => 1,
                'menu_type' => 'public',
            ],
            [
                'title' => 'News',
                'url' => '/news',
                'icon' => 'ti ti-news',
                'type' => 'item',
                'parent_id' => null,
                'position' => 2,
                'menu_type' => 'public',
            ],
            [
                'title' => 'Doctors',
                'url' => '/doctors',
                'icon' => 'ti ti-user',
                'type' => 'item',
                'parent_id' => null,
                'position' => 3,
                'menu_type' => 'public',
            ],
            [
                'title' => 'Schedules',
                'url' => '/schedules',
                'icon' => 'ti ti-calendar',
                'type' => 'item',
                'parent_id' => null,
                'position' => 4,
                'menu_type' => 'public',
            ],
        ];
        $this->db->table('menus')->insertBatch($menus);
    }
}
