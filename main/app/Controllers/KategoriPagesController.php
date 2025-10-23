<?php

namespace App\Controllers;

use App\Models\KategoriPagesModel;
use CodeIgniter\Controller;

class KategoriPagesController extends Controller
{
    public function index()
    {
        $model = new KategoriPagesModel();
        $kategori = $model->findAll();
        return view('admin/kategori_pages/index', ['kategori' => $kategori]);
    }

    public function create()
    {
        return view('admin/kategori_pages/create');
    }

    public function store()
    {
        $model = new KategoriPagesModel();
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'slug_kategori' => $this->request->getPost('slug_kategori'),
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $path = FCPATH . 'uploads/kategori';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $file->move($path, $newName);
            $data['gambar'] = 'uploads/kategori/' . $newName;
        }

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }

        return redirect()->to(base_url('admin/kategori-pages'));
    }
  public function edit($id)
    {
        $kategoriModel = new KategoriPagesModel();
        $kategori = $kategoriModel->find($id);
        return view('admin/kategori_pages/edit', ['kategori' => $kategori]);
    }

    public function update($id)
    {
        $model = new KategoriPagesModel();
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'slug_kategori' => $this->request->getPost('slug_kategori'),
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $path = FCPATH . 'uploads/kategori';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $file->move($path, $newName);
            $data['gambar'] = 'uploads/kategori/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to(base_url('admin/kategori-pages'));
    }





    public function delete($id)
    {
        $model = new KategoriPagesModel();
        $model->delete($id);
        return redirect()->to(base_url('admin/kategori-pages'));
    }
}
