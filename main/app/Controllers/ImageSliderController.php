<?php

namespace App\Controllers;

use App\Models\ImageSliderModel;

class ImageSliderController extends BaseController
{
    protected $imageSliderModel;

    public function __construct()
    {
        $this->imageSliderModel = new ImageSliderModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['sliders'] = $this->imageSliderModel->findAll();
        return view('admin/image_slider/index', $data);
    }

    public function create()
    {
        return view('admin/image_slider/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'image' => 'uploaded[image]|is_image[image]|max_size[image,15120]' // max 5MB
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $img = $this->request->getFile('image');
        $imgName = $img->getRandomName();
        $img->move('uploads/image_slider', $imgName);

        $this->imageSliderModel->save([
            'image' => $imgName,
        ]);

        return redirect()->to('/admin/image-slider')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slider = $this->imageSliderModel->find($id);
        if (!$slider) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/image_slider/edit', ['slider' => $slider]);
    }

    public function update($id)
    {
        $slider = $this->imageSliderModel->find($id);
        if (!$slider) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $img = $this->request->getFile('image');
        $imgName = $slider['image'];

        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Hapus gambar lama
            if (file_exists('uploads/image_slider/' . $imgName)) {
                unlink('uploads/image_slider/' . $imgName);
            }

            // Simpan gambar baru
            $imgName = $img->getRandomName();
            $img->move('uploads/image_slider', $imgName);
        }

        $this->imageSliderModel->update($id, [
            'image' => $imgName,
        ]);

        return redirect()->to('/admin/image-slider')->with('success', 'Slider berhasil diperbarui.');
    }

    public function delete($id)
    {
        $slider = $this->imageSliderModel->find($id);
        if (!$slider) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (file_exists('uploads/sliders/' . $slider['image'])) {
            unlink('uploads/sliders/' . $slider['image']);
        }

        $this->imageSliderModel->delete($id);
        return redirect()->to('/image-slider')->with('success', 'Gambar berhasil dihapus.');
    }
}
