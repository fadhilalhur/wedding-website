<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\NewsModel;
use App\Models\DoctorModel;
use App\Models\SchedulesModel;

class AdminController extends BaseController
{
    public function index()
    {
        $menuModel = new MenuModel();
        $beritaModel = new NewsModel();
        $dokterModel = new DoctorModel();
        $jadwalModel = new SchedulesModel();

        $menus = $menuModel->where('type', 'admin')->orderBy('position', 'asc')->findAll();
        return view('admin/dashboard', [
            'total_berita' => $beritaModel->countAll(),       // Total berita
            'total_dokter' => $dokterModel->countAll(),       // Total dokter
            'jadwal_aktif' => $jadwalModel->countAll(),
            'menus' => $menus,
        ]);
    }
    // Controller method untuk CRUD berita, dokter, jadwal, menu akan ditambahkan berikutnya
}
