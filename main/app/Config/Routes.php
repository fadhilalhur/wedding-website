<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// AUTH
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// PUBLIC WEB
$routes->get('/', 'PublicWebController::index'); // Halaman utama


// Daftar berita (opsional, jika ingin halaman khusus daftar berita)
$routes->get('news', 'PublicWebController::berita');
$routes->get('berita/(:segment)', 'PublicWebController::detail/$1');
$routes->get('berita/ajaxSearch', 'PublicWebController::ajaxSearch');

// Detail berita
$routes->get('news/(:segment)', 'NewsController::newsDetail/$1');
// Daftar dokter
$routes->get('doctors', 'PublicWebController::doctors');
$routes->get('sliders', 'PublicWebController::sliders');
$routes->get('/news/live-search', 'NewsController::liveSearch');
$routes->get('/jadwal-dokter', 'PublicWebController::jadwalDokter');
$routes->get('/get-jadwal-dokter', 'PublicWebController::getJadwalDokter');
$routes->get('get-doctor-filter-options', 'PublicWebController::getDoctorFilterOptions');

$routes->get('kontak-kami', 'PublicWebController::kontakKami');
$routes->post('kontak-kami', 'PublicWebController::kirimPesan');

// Jadwal dokter
$routes->get('schedules', 'PublicWebController::schedules');

$routes->get('asuransi', 'PublicWebController::asuransi');


// Halaman profil
$routes->get('profil', 'PublicWebController::profil');

// Halaman fasilitas
$routes->get('fasilitas', 'PublicWebController::fasilitas');
$routes->get('fasilitas/ajaxSearch', 'PublicWebController::ajaxFasilitasSearch');
$routes->get('pages/(:segment)', 'PublicWebController::detailFasilitas/$1');

// Halaman karir
$routes->get('karir', 'PublicWebController::karir');

// Sub-halaman profil (misal: sejarah, visimisi)
$routes->get('profil/about', 'PublicWebController::about');
$routes->get('profil/sejarah', 'PublicWebController::sejarah');
$routes->get('profil/visimisi', 'PublicWebController::visimisi');
// ADMIN
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');

    // CRUD Berita
    $routes->get('news', 'NewsController::index');
    $routes->get('news/create', 'NewsController::create');
    $routes->post('news/store', 'NewsController::store');
    $routes->get('news/edit/(:num)', 'NewsController::edit/$1');
    $routes->post('news/update/(:num)', 'NewsController::update/$1');
    $routes->get('news/delete/(:num)', 'NewsController::delete/$1');
    // CRUD Dokter
    $routes->get('doctors', 'DoctorController::index');
    $routes->get('doctors/create', 'DoctorController::create');
    $routes->post('doctors/create', 'DoctorController::create');
    $routes->get('doctors/edit/(:num)', 'DoctorController::edit/$1');
    $routes->post('doctors/edit/(:num)', 'DoctorController::edit/$1');
    $routes->get('doctors/delete/(:num)', 'DoctorController::delete/$1');
    // Profil Perusahaan
    $routes->get('company', 'CompanyController::index');
    $routes->get('company/edit', 'CompanyController::edit');
    $routes->post('company/edit', 'CompanyController::edit');

    // CRUD Media
    $routes->get('media', 'MediaController::index');
    $routes->get('media/create', 'MediaController::create');
    $routes->post('media/create', 'MediaController::store');
    $routes->get('media/edit/(:num)', 'MediaController::edit/$1');
    $routes->post('media/edit/(:num)', 'MediaController::edit/$1');
    $routes->get('media/delete/(:num)', 'MediaController::delete/$1');

    // CRUD Pages
    $routes->get('pages', 'PagesController::index');
    $routes->get('pages/create', 'PagesController::create');
    $routes->post('pages/store', 'PagesController::store');
    $routes->get('pages/edit/(:num)', 'PagesController::edit/$1');
    $routes->post('pages/update/(:num)', 'PagesController::update/$1');
    $routes->get('pages/delete/(:num)', 'PagesController::delete/$1');


    // CRUD Kategori Pages
    $routes->get('kategori-pages', 'KategoriPagesController::index');
    $routes->get('kategori-pages/create', 'KategoriPagesController::create');
    $routes->post('kategori-pages/store', 'KategoriPagesController::store');
    $routes->get('kategori-pages/edit/(:num)', 'KategoriPagesController::edit/$1');
    $routes->post('kategori-pages/update/(:num)', 'KategoriPagesController::update/$1');
    $routes->get('kategori-pages/delete/(:num)', 'KategoriPagesController::delete/$1');

    // CRUD Schedules
    $routes->get('schedules', 'SchedulesController::index');
    $routes->get('schedules/create', 'SchedulesController::create');
    $routes->post('schedules/create', 'SchedulesController::store'); // ← INI WAJIB ADA
    $routes->get('schedules/edit/(:num)', 'SchedulesController::edit/$1');
    $routes->post('schedules/edit/(:num)', 'SchedulesController::update/$1');
    $routes->get('schedules/delete/(:num)', 'SchedulesController::delete/$1');

    // CRUD Poli Master
    $routes->get('poli_master', 'PoliMasterController::index');
    $routes->get('poli_master/create', 'PoliMasterController::create');
    $routes->post('poli_master/store', 'PoliMasterController::store');
    $routes->get('poli_master/edit/(:num)', 'PoliMasterController::edit/$1');
    $routes->post('poli_master/update/(:num)', 'PoliMasterController::update/$1');
    $routes->get('poli_master/delete/(:num)', 'PoliMasterController::delete/$1');


    // CRUD Users
    $routes->get('users', 'UsersController::index');
    $routes->get('users/create', 'UsersController::create');
    $routes->post('users/store', 'UsersController::store'); // untuk simpan user baru
    $routes->get('users/edit/(:num)', 'UsersController::edit/$1');
    $routes->post('users/update/(:num)', 'UsersController::update/$1'); // untuk update user
    $routes->get('users/delete/(:num)', 'UsersController::delete/$1');
    $routes->get('users/(:num)', 'UsersController::show/$1');

    // CRUD Image Slider
    $routes->get('image-slider', 'ImageSliderController::index');
    $routes->get('image-slider/create', 'ImageSliderController::create');
    $routes->post('image-slider/store', 'ImageSliderController::store');
    $routes->get('image-slider/edit/(:num)', 'ImageSliderController::edit/$1');
    $routes->post('image-slider/update/(:num)', 'ImageSliderController::update/$1');
    $routes->post('image-slider/delete/(:num)', 'ImageSliderController::delete/$1');

    // CRUD Spesialis

    $routes->get('master-spesialis', 'SpesialisController::index');
    $routes->get('master-spesialis/create', 'SpesialisController::create');
    $routes->post('master-spesialis/create', 'SpesialisController::store');
    $routes->get('master-spesialis/edit/(:num)', 'SpesialisController::edit/$1');
    $routes->post('master-spesialis/edit/(:num)', 'SpesialisController::update/$1');
    $routes->get('master-spesialis/delete/(:num)', 'SpesialisController::delete/$1');

    // CRUD Asuransi
    $routes->get('asuransi', 'AsuransiController::index');
    $routes->get('asuransi/create', 'AsuransiController::create');
    $routes->post('asuransi/create', 'AsuransiController::create');
    $routes->get('asuransi/edit/(:num)', 'AsuransiController::edit/$1');
    $routes->post('asuransi/edit/(:num)', 'AsuransiController::edit/$1');
    $routes->get('asuransi/delete/(:num)', 'AsuransiController::delete/$1');
});

// PUBLIC WEB
$routes->get('/', 'PublicWebController::index');
// Detail berita
$routes->get('news/(:segment)', 'PublicWebController::newsDetail/$1');
// Daftar dokter
$routes->get('doctors', 'PublicWebController::doctors');
// Jadwal dokter
$routes->get('schedules', 'PublicWebController::schedules');
