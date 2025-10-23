<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SpesialisModel;

class SpesialisController extends BaseController
{
    public function index()
    {
        $model = new SpesialisModel();
        $data['spesialis'] = $model->findAll();
        return view('admin/master_spesialis/index', $data);
    }

    public function create()
    {
        return view('admin/master_spesialis/create');
    }

    public function store()
    {
        $model = new SpesialisModel();
        $file = $this->request->getFile('photo');
        $filename = '';

        if ($file && $file->isValid()) {
            $filename = $file->getRandomName();
            $file->move('uploads/spesialis', $filename);
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'photo'     => $filename
        ];
        $model->insert($data);
        return redirect()->to(base_url('admin/master-spesialis'));
    }

    public function edit($id)
    {
        $model = new SpesialisModel();
        $data['spesialis'] = $model->find($id);
        return view('admin/master_spesialis/edit', $data);
    }

    public function update($id)
    {
        $model = new SpesialisModel();
        $data = [
            'name'      => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $file = $this->request->getFile('photo');
        if ($file && $file->isValid()) {
            $filename = $file->getRandomName();
            $file->move('uploads/spesialis', $filename);
            $data['photo'] = $filename;
        }

        $model->update($id, $data);
        return redirect()->to(base_url('admin/master-spesialis'));
    }

    public function delete($id)
    {
        $model = new SpesialisModel();
        $spesialis = $model->find($id);

        if ($spesialis && file_exists('uploads/spesialis/' . $spesialis['photo'])) {
            unlink('uploads/spesialis/' . $spesialis['photo']);
        }

        $model->delete($id);
        return redirect()->to(base_url('admin/master-spesialis'));
    }
}
