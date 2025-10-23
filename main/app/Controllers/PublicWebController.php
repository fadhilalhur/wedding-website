<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\CompanyModel;
use App\Models\PagesModel;
use App\Models\ImageSliderModel;
use App\Models\NewsModel;
use App\Models\PromoModel;
use App\Models\DoctorModel;
use App\Models\ContactModel;
use App\Models\SchedulesModel;
use App\Models\AsuransiModel;
use App\Models\KategoriPagesModel;

class PublicWebController extends BaseController
{
    protected $imageSliderModel;
    protected $helpers = ['company'];
    public function __construct()
    {
        helper(['form', 'url', 'text']);
        $this->imageSliderModel = new ImageSliderModel();
        $this->asuransiModel = new AsuransiModel();
    }
    
    public function Call()
    {
	return view('call');
    }

    public function asuransi()
    {
        $menuModel    = new MenuModel();
        $companyModel = new CompanyModel();
        $asuransiModel = new AsuransiModel();
        $bredcam = new KategoriPagesModel();
    
        // Fetch company data (assuming single record)
        $company = $companyModel->first();
        $bredcam_kategori = $bredcam->find(7);
        // Fetch menus with Query Builder
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
    
        // Fetch insurance data with Query Builder
        $asuransi = $asuransiModel
            ->select('id, nama, logo, deskripsi, created_at, updated_at')
            ->orderBy('id', 'DESC') // Optional: Order by ID descending
            ->findAll();
    
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'asuransi' => $asuransi,
            'breadcam' => $bredcam_kategori,
            'title'   => 'Daftar Asuransi',
            'content' => 'public_web1/asuransi/index',
        ]);
    }
    
    public function index_v2()
    {
        $pagesModel = new PagesModel();
        $menuModel = new MenuModel();
        $newsModel = new NewsModel();

        $fasilitas = $pagesModel->select('pages.*, kategori_pages.nama_kategori, kategori_pages.slug_kategori')
            ->join('kategori_pages', 'kategori_pages.id = pages.kategori_id')
            ->where('pages.kategori_id', 1) //  1 = Fasilitas
            ->orderBy('pages.created_at', 'desc')
            ->findAll();
        $pelayanan_unggulan = $pagesModel->select('pages.*, kategori_pages.nama_kategori, kategori_pages.slug_kategori')
            ->join('kategori_pages', 'kategori_pages.id = pages.kategori_id')
            ->where('pages.kategori_id', 3) // 1 = pelayanan unggulan
            ->orderBy('pages.created_at', 'desc')
            ->findAll(3);

        // Ambil semua menu public
        $menus = $menuModel->where('menu_type', 'public')->orderBy('position', 'asc')->findAll();
        $news = $newsModel->orderBy('published_at', 'desc')->findAll(6);

        return view('public_web_v2/index', [
            'menus' => $menus,
            'fasilitas' => $fasilitas,
            'news' => $news,
            'pelayanan_unggulan' => $pelayanan_unggulan,

        ]);
    }
    public function index()
    {
        $menuModel    = new MenuModel();
        $pagesModel = new PagesModel();

        $companyModel = new CompanyModel();
        $newsModel    = new NewsModel();
        $doktorModel    = new DoctorModel();

        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        $company = $companyModel->first();
        $news = $newsModel->orderBy('created_at', 'DESC')->findAll(6);
        $doktor = $doktorModel->orderBy('created_at', 'DESC')->findAll();
        $pelayanan_unggulan = $pagesModel->select('pages.*, kategori_pages.nama_kategori, kategori_pages.slug_kategori')
            ->join('kategori_pages', 'kategori_pages.id = pages.kategori_id')
            ->where('pages.kategori_id', 3) // 1 = pelayanan unggulan
            ->orderBy('pages.created_at', 'desc')
            ->findAll(3);
        $fasilitas = $pagesModel->select('pages.*, kategori_pages.nama_kategori, kategori_pages.slug_kategori')
            ->join('kategori_pages', 'kategori_pages.id = pages.kategori_id')
            ->where('pages.kategori_id', 1) //  1 = Fasilitas
            ->orderBy('pages.created_at', 'desc')
            ->findAll();
        $sliders = $pagesModel->select('pages.*, kategori_pages.nama_kategori, kategori_pages.slug_kategori')
            ->join('kategori_pages', 'kategori_pages.id = pages.kategori_id')
            ->where('pages.kategori_id', 5) //  1 = slider
            ->orderBy('pages.created_at', 'desc')
            ->findAll();
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news'    => $news,
            'doctor'  => $doktor,
            'fasilitas' => $fasilitas,
            'sliders' => $sliders,

            'pelayanan_unggulan' => $pelayanan_unggulan,

            'content' => 'public_web1/dashboard/content',
        ]);
    }
    public function ajaxSearch()
    {
        $model = new NewsModel();
        $search = $this->request->getGet('q');

        $query = $model->orderBy('published_at', 'DESC');

        if (!empty($search)) {
            $query->like('title', $search);
        }

        $news = $query->findAll(5); // ambil 5 hasil

        return view('public_web1/berita/ajax_news_list', ['news' => $news]);
    }
    
    public function batterymonitor()
    {
        $this->response->setHeader('Content-Type', 'application/json');
    
        $raw = file_get_contents("php://input");
        $json = json_decode($raw, true);
        
        $logFile = WRITEPATH . 'battery_log.txt'; // file di writable/ folder
        $logEntry = "[" . date('Y-m-d H:i:s') . "] RAW INPUT: " . $raw . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);
    
        $device_id = $json['device_id'] ?? null;
        $level     = $json['level'] ?? null;
        $status    = $json['status'] ?? null;
    
        if (!$device_id || !$level || !$status) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Incomplete data'
            ]);
        }
    
        $db = \Config\Database::connect('super_app');
        $builder = $db->table('battery_status');
    
        $data = [
            'device_id'  => $device_id,
            'level'      => $level,
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        $exists = $builder->where('device_id', $device_id)->get()->getRow();
    
        if ($exists) {
            $builder->where('device_id', $device_id)->update($data);
            $affected = $db->affectedRows();
            $action = 'updated';
        } else {
            $builder->insert($data);
            $affected = $db->affectedRows();
            $action = 'inserted';
        }
        
        $logEntry = "[" . date('Y-m-d H:i:s') . "] Data $action, affectedRows=$affected, device_id=$device_id, level=$level, status=$status" . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);
    
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Battery status updated'
        ]);
    }


    public function berita()
    {
        $model = new NewsModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $search = $this->request->getGet('q');
        $query = $model->orderBy('published_at', 'DESC');
        $bredcam_kategori = $bredcam->find(11);

        if (!empty($search)) {
            $query->like('title', $search);
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();

        $news = $query->paginate(5);

        $recentPosts = $model
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->findAll();

        $pager = $model->pager;
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news' => $news,
            'pager' => $pager,
            'search' => $search,
            'breadcam' => $bredcam_kategori,
            'recentPosts' => $recentPosts,
            'content' => 'public_web1/berita/berita_list',
        ]);
    }

    public function promo()
    {
        $model = new NewsModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $search = $this->request->getGet('q');
        $query = $model
                ->where('show_as_promo', 1)
                ->orderBy('published_at', 'DESC');
        $bredcam_kategori = $bredcam->find(13);

        if (!empty($search)) {
            $query->like('title', $search);
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();

        $news = $query->paginate(5);

        $recentPosts = $model
            ->where('show_as_promo', 1) // Pastikan recentPosts juga hanya ambil yang promo
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->findAll();

        $pager = $model->pager;
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news' => $news,
            'pager' => $pager,
            'search' => $search,
            'breadcam' => $bredcam_kategori,
            'recentPosts' => $recentPosts,
            'content' => 'public_web1/promo/promo_list',
        ]);
    }

    public function detail($slug)
    {
        $newsModel = new NewsModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        // Ambil berita berdasarkan slug
        $news = $newsModel->where('slug', $slug)->first();
        $bredcam_kategori = $bredcam->find(12);

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Berita tidak ditemukan.");
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        // Ambil 4 berita terbaru lain sebagai recent posts
        $recentPosts = $newsModel->orderBy('published_at', 'DESC')
            ->where('id !=', $news['id'])
            ->findAll(4);

        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news' => $news,
            'breadcam' => $bredcam_kategori,
            'recentPosts' => $recentPosts,
            'content' => 'public_web1/berita/berita_detail',
        ]);
    }

    public function detailpromo($slug)
    {
        $newsModel = new PromoModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        // Ambil berita berdasarkan slug
        $news = $newsModel->where('slug', $slug)->first();
        $bredcam_kategori = $bredcam->find(14);

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Berita tidak ditemukan.");
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        // Ambil 4 berita terbaru lain sebagai recent posts
        $recentPosts = $newsModel->orderBy('published_at', 'DESC')
            ->where('id !=', $news['id'])
            ->findAll(4);

        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news' => $news,
            'breadcam' => $bredcam_kategori,
            'recentPosts' => $recentPosts,
            'content' => 'public_web1/promo/promo_detail',
        ]);
    }

    public function doctors()
    {
        $model = new NewsModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $doktorModel    = new DoctorModel();
        $bredcam = new KategoriPagesModel();

        $bredcam_kategori = $bredcam->find(6);

        $search = $this->request->getGet('q');
        $query = $model->orderBy('published_at', 'DESC');
        $doctor = $doktorModel->orderBy('created_at', 'DESC')->findAll();
        if (!empty($search)) {
            $query->like('title', $search);
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();

        $news = $query->paginate(5);

        $recentPosts = $model
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->findAll();

        $pager = $model->pager;
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'news' => $news,
            'pager' => $pager,
            'doctor'  => $doctor,
            'breadcam' => $bredcam_kategori,
            'search' => $search,
            'recentPosts' => $recentPosts,
            'content' => 'public_web1/dokter/dokter_list',
        ]);
    }

    // public function visimisi()
    // {
    //     $db = db_connect();
    //     $companyVisiMisi = $db->table('company_visi_misi')
    //         ->where('deleted', 0)
    //         ->orderBy('id', 'DESC')
    //         ->get()
    //         ->getResultArray();

    //     return view('public_web/visi_misi2', [
    //         'companyVisiMisi' => $companyVisiMisi
    //     ]);
    // }

    public function fasilitas()
    {
        $model = new PagesModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();

        $search = $this->request->getGet('q');
        $bredcam_kategori = $bredcam->find(1);
        $query = $model->where('kategori_id', 1)->orderBy('created_at', 'DESC');

        if (!empty($search)) {
            $query->like('title', $search);
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        $fasilitas = $query->paginate(5);
        $pager = $model->pager;
        $recentFasilitas = $model
            ->where('kategori_id', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->findAll();

        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'fasilitas' => $fasilitas,
            'breadcam' => $bredcam_kategori,
            'pager'     => $pager,
            'search'    => $search,
            'recentFasilitas' => $recentFasilitas,
            'content'   => 'public_web1/fasilitas/fasilitas', // ganti sesuai folder view-mu
        ]);
    }
    public function detailFasilitas($slug)
    {
        $model = new \App\Models\PagesModel();
        $companyModel = new CompanyModel();
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();

        $fasilitas = $model
            ->where('slug', $slug)
            ->where('kategori_id', 1)
            ->first();
        $bredcam_kategori = $bredcam->find(10);
        
        if (!$fasilitas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Fasilitas tidak ditemukan.");
        }
        $company = $companyModel->first();
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        $recentFasilitas = $model
            ->where('kategori_id', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->findAll();

        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'fasilitas' => $fasilitas,
            'breadcam' => $bredcam_kategori,
            'recentFasilitas' => $recentFasilitas,
            'content' => 'public_web1/fasilitas/detail_fasilitas',
        ]);
    }

    public function sliders()
    {
        $data['sliders'] = $this->imageSliderModel->findAll();

        return view('public_web/dashboard', $data);
    }

    public function sejarah()
    {
        $pagesModel = new PagesModel();
        $sejarah = $pagesModel->where('slug', 'sejarah')->first();

        return view('public_web/featured_section', [
            'sejarah' => $sejarah
        ]);
    }

    public function kontakKami()
    {
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $bredcam_kategori = $bredcam->find(8);

        $companyModel = new CompanyModel();
        $company = $companyModel->first(); // Asumsikan hanya 1 baris company
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'breadcam' => $bredcam_kategori,
            'content' => 'public_web1/kontak/kontak_kami',
        ]);
    }

    public function profil()
    {
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $bredcam_kategori = $bredcam->find(15);

        $profilModel = new PagesModel();
        $profil = $profilModel
                ->where('kategori_id', 15)
                ->first();

        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        
        $companyModel = new CompanyModel();
        $company = $companyModel->first(); 

        return view('layouts/public_web1', [
            'company' => $company,
            'profil' => $profil,
            'menus'   => $menus,
            'breadcam' => $bredcam_kategori,
            'content' => 'public_web1/kontak/profil',
        ]);
    }

    public function visimisi()
    {
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $bredcam_kategori = $bredcam->find(3);

        $profilModel = new PagesModel();
        $visimisi = $profilModel
                ->where('kategori_id', 3)
                ->first();

        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        
        $companyModel = new CompanyModel();
        $company = $companyModel->first(); 

        return view('layouts/public_web1', [
            'company' => $company,
            'profil' => $visimisi,
            'menus'   => $menus,
            'breadcam' => $bredcam_kategori,
            'content' => 'public_web1/kontak/visimisi',
        ]);
    }

    public function mutu()
    {
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $bredcam_kategori = $bredcam->find(16);

        $profilModel = new PagesModel();
        $visimisi = $profilModel
                ->where('kategori_id', 16)
                ->first();

        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        
        $companyModel = new CompanyModel();
        $company = $companyModel->first(); 

        return view('layouts/public_web1', [
            'company' => $company,
            'profil' => $visimisi,
            'menus'   => $menus,
            'breadcam' => $bredcam_kategori,
            'content' => 'public_web1/kontak/mutu',
        ]);
    }

    public function kirimPesan()
    {
        // dd('Fungsi dijalankan');
        $contactModel = new ContactModel();

        $data = $this->request->getPost([
            'name',
            'email',
            'subject',
            'message'
        ]);

        // Optional: validasi sederhana
        if (empty($data['name']) || empty($data['email']) || empty($data['subject']) || empty($data['message'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        $contactModel->insert($data);

        return redirect()->to('kontak-kami')->with('success', 'Pesan berhasil dikirim!');
    }

    public function getDoctorFilterOptions()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('doctors');

        $doctorNames = $builder->select('name')->distinct()->orderBy('name')->get()->getResultArray();
        $poliList = $builder->select('poli')->distinct()->orderBy('poli')->get()->getResultArray();

        return $this->response->setJSON([
            'doctors' => array_column($doctorNames, 'name'),
            'poli' => array_column($poliList, 'poli')
        ]);
    }

    public function jadwalDokter()
    {
        $menuModel    = new MenuModel();
        $bredcam = new KategoriPagesModel();
        $companyModel = new CompanyModel();

        $bredcam_kategori = $bredcam->find(9);

        $company = $companyModel->first(); // Asumsikan hanya 1 baris company
        $menus = $menuModel
            ->where('menu_type', 'public')
            ->orderBy('position', 'ASC')
            ->findAll();
        $db = \Config\Database::connect();

        $builder = $db->table('doctors'); // Mendapatkan Query Builder untuk tabel 'doctors'

        $allPoli = $builder->select('poli')
            ->distinct()
            ->orderBy('poli', 'ASC')
            ->get()
            ->getResultArray();

        $poliOptions = array_column($allPoli, 'poli');

        // Untuk hari, tetap bisa hardcode karena sifatnya tetap
        $hariOptions = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $data = [
            'poli_options' => $poliOptions, // Tetap sediakan jika view masih membutuhkannya untuk contoh
            'hari_options' => $hariOptions, // Tetap sediakan jika view masih membutuhkannya untuk contoh
            'doctors_data' => [] // Akan di-load via AJAX oleh JavaScript
        ];

        return view('layouts/public_web1', [
            'company' => $company,
            'menus'   => $menus,
            'data'   => $data,
            'breadcam' => $bredcam_kategori,
            'content' => 'public_web1/dokter/jadwal_dokter_v2',
        ]);
    }

    public function getJadwalDokter()
    {
        $request = $this->request;
        $namaDokter = $request->getGet('nama_dokter');
        $poli = $request->getGet('poli');
        $hari = $request->getGet('hari'); // Bisa array
        $mode = $request->getGet('mode');
        $doctorName = $request->getGet('doctorName'); // Untuk detail jadwal

        $db = \Config\Database::connect();
        $builder = $db->table('jadwal_dokter');

        $builder->select(
            'jadwal_dokter.id, doctors.name AS nama_dokter, doctors.poli, doctors.photo,
         jadwal_dokter.hari, jadwal_dokter.jam_mulai, jadwal_dokter.jam_selesai, doctors.specialization'
        );
        $builder->join('doctors', 'doctors.name = jadwal_dokter.nama_dokter');

        // Mode detail untuk jadwal spesifik dokter
        if ($mode === 'detail' && !empty($doctorName)) {
            $builder->where('doctors.name', urldecode($doctorName));
            $jadwalDetail = $builder->get()->getResultArray();
            if (empty($jadwalDetail)) {
                return $this->response->setJSON(['error' => 'Dokter tidak ditemukan'], 404);
            }
            return $this->response->setJSON($jadwalDetail);
        }


        // Filter berdasarkan nama dokter (dari input atau select)
        if (!empty($namaDokter)) {
            $builder->where('doctors.name LIKE', "%$namaDokter%"); // Pencarian parsial
        }
        if (!empty($poli)) {
            $builder->where('doctors.poli', $poli);
        }

        if (!empty($hari) && is_array($hari)) {
            $builder->whereIn('jadwal_dokter.hari', $hari);
        }

        $result = $builder->get()->getResultArray();

        // Group by nama_dokter
        $grouped = [];
        foreach ($result as $row) {
            $key = $row['nama_dokter'];
            if (!isset($grouped[$key])) {
                $grouped[$key] = [
                    'nama_dokter' => $row['nama_dokter'],
                    'poli' => $row['poli'],
                    'jadwal_details' => []
                ];
            }
            $grouped[$key]['jadwal_details'][] = $row;
        }

        return $this->response->setJSON(array_values($grouped));
    }
}
