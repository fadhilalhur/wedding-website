<?php

namespace App\Controllers;

use App\Models\PagesModel;
use App\Models\KategoriPagesModel;
use CodeIgniter\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pagesModel = new PagesModel();
        $pages = $pagesModel->findAll();
        return view('admin/pages/index', ['pages' => $pages]);
    }

    public function create()
    {
        $kategoriModel = new KategoriPagesModel();
        $kategori_pages = $kategoriModel->findAll();
        return view('admin/pages/create', ['kategori_pages' => $kategori_pages]);
    }

    public function store()
    {
        $pagesModel = new PagesModel();
        $kategoriModel = new KategoriPagesModel();

        $kategori_id = $this->request->getPost('kategori_id');
        $kategori = $kategoriModel->find($kategori_id);
        $kategori_slug = url_title($kategori['nama_kategori'], '-', true); // gunakan nama kategori sebagai folder

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'kategori_id' => $kategori_id,
            'link_yt' => $this->request->getPost('link_yt'),
        ];

        // Upload gambar
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/pages/' . $kategori_slug;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $newName);
            $data['gambar'] = 'uploads/pages/' . $kategori_slug . '/' . $newName;
        }

        if (!$pagesModel->insert($data)) {
            return $this->response->setStatusCode(400)->setBody('Gagal simpan: ' . implode(', ', $pagesModel->errors()));
        }

        return redirect()->to(base_url('admin/pages'));
    }


    public function edit($id)
    {
        $pagesModel = new PagesModel();
        $kategoriModel = new KategoriPagesModel();
        $page = $pagesModel->find($id);
        $kategori_pages = $kategoriModel->findAll();
        return view('admin/pages/edit', [
            'page' => $page,
            'kategori_pages' => $kategori_pages
        ]);
    }

    public function update($id)
    {
        $pagesModel = new PagesModel();
        $kategoriModel = new KategoriPagesModel();

        $kategori_id = $this->request->getPost('kategori_id');
        $kategori = $kategoriModel->find($kategori_id);
        $kategori_slug = url_title($kategori['nama_kategori'], '-', true);

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'kategori_id' => $kategori_id,
            'link_yt' => $this->request->getPost('link_yt'),
        ];

        // Upload gambar baru jika ada
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/pages/' . $kategori_slug;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $newName);
            $data['gambar'] = 'uploads/pages/' . $kategori_slug . '/' . $newName;
        }

        $pagesModel->update($id, $data);
        return redirect()->to(base_url('admin/pages'));
    }


    public function delete($id)
    {
        $pagesModel = new PagesModel();
        $pagesModel->delete($id);
        return redirect()->to(base_url('admin/pages'));
    }


    public function fasilitas()
    {
        $pagesModel = new \App\Models\PagesModel();
        $fasilitas = $pagesModel->where('kategori_id', 3)->findAll();

        return view('public_web/tabs_section', [
            'fasilitas' => $fasilitas
        ]);
    }
}
