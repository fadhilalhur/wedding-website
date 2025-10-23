<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->orderBy('published_at', 'desc')->findAll();
        return view('admin/news/index', ['news' => $news]);
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function store()
    {
        $newsModel = new NewsModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'content' => $this->request->getPost('content'),
            'published_at' => $this->request->getPost('published_at'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
        ];
        // Handle featured image
        $file = $this->request->getFile('featured_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/news';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $newName);
            $data['featured_image'] = 'uploads/news/' . $newName;
        }
        $newsModel->insert($data);
        return redirect()->to('/admin/news');
    }

    public function edit($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);
        return view('admin/news/edit', ['news' => $news]);
    }

    public function update($id)
    {
        $newsModel = new NewsModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'content' => $this->request->getPost('content'),
            'published_at' => $this->request->getPost('published_at'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
        ];
        $file = $this->request->getFile('featured_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/news';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $newName);
            $data['featured_image'] = 'uploads/news/' . $newName;
        }
        $newsModel->update($id, $data);
        return redirect()->to('/admin/news');
    }

    public function delete($id)
    {
        $newsModel = new NewsModel();
        $newsModel->delete($id);
        return redirect()->to('/admin/news');
    }

    // PUBLIC WEB

    public function newsList()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->orderBy('published_at', 'desc')->paginate(6); // 6 berita per halaman
        $pager = $newsModel->pager;

        return view('public_web/services_section', [
            'news' => $news,
            'pager' => $pager
        ]);
    }

    public function newsDetail($slug)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->where('slug', $slug)->first();

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Berita tidak ditemukan.");
        }

        return view('public_web/news_detail', [
            'news' => $news,
        ]);
    }

    public function liveSearch()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('news');

        $search = $this->request->getGet('search');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 5;

        if ($search) {
            $builder->like('title', $search);
        }

        $builder->select('id, title, slug, published_at');
        $builder->orderBy('published_at', 'DESC');

        $total = $builder->countAllResults(false);
        $newsList = $builder->get($perPage, ($page - 1) * $perPage)->getResultArray();
        $pager = \Config\Services::pager();
        $pagination = $pager->makeLinks($page, $perPage, $total, 'bootstrap');

        return view('news/_news_list', [
            'newsList' => $newsList,
            'pagination' => $pagination,
        ]);
    }
}
