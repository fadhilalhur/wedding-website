<?php

namespace App\Controllers;

use App\Models\PoliMasterModel;
use CodeIgniter\Controller;

class PoliMasterController extends Controller
{
    public function index()
    {
        $model = new PoliMasterModel();
        $data['poli'] = $model->findAll();
        return view('admin/poli_master/index', $data);
    }

    public function create()
    {
        return view('admin/poli_master/create');
    }

    public function store()
    {
        $model = new PoliMasterModel();

        $photo = $this->request->getFile('photo');
        $photoName = '';

        if ($photo && $photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/poli', $photoName);
        }

        $model->insert([
            'name'        => $this->request->getPost('name'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'photo'       => $photoName,
        ]);

        return redirect()->to(base_url('admin/poli_master'))->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new PoliMasterModel();
        $data['poli'] = $model->find($id);
        return view('admin/poli_master/edit', $data);
    }

    public function update($id)
    {
        $model = new PoliMasterModel();
        $poli = $model->find($id);

        $photo = $this->request->getFile('photo');
        $photoName = $poli['photo'];

        if ($photo && $photo->isValid()) {
            if ($photoName && file_exists('uploads/poli/' . $photoName)) {
                unlink('uploads/poli/' . $photoName);
            }
            $photoName = $photo->getRandomName();
            $photo->move('uploads/poli', $photoName);
        }

        $model->update($id, [
            'name'        => $this->request->getPost('name'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'photo'       => $photoName,
        ]);

        return redirect()->to(base_url('admin/poli_master'))->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new PoliMasterModel();
        $data = $model->find($id);

        if ($data && $data['photo'] && file_exists('uploads/poli/' . $data['photo'])) {
            unlink('uploads/poli/' . $data['photo']);
        }

        $model->delete($id);
        return redirect()->to(base_url('admin/poli_master'))->with('success', 'Data berhasil dihapus');
    }
}
