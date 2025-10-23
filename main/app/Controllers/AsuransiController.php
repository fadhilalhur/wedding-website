<?php

namespace App\Controllers;

use App\Models\AsuransiModel;

class AsuransiController extends BaseController
{
    public function index()
    {
        $model = new AsuransiModel();
        $data['asuransi'] = $model->findAll();
        return view('admin/asuransi/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $logoName = null;

            $file = $this->request->getFile('logo');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $logoName = uniqid() . '.' . $file->getExtension();
                $file->move('uploads/asuransi/', $logoName);
            }

            $model = new AsuransiModel();
            $model->insert([
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'logo' => $logoName
            ]);

            return redirect()->to('/admin/asuransi');
        }

        return view('admin/asuransi/create');
    }

    public function edit($id)
    {
        $model = new AsuransiModel();
        $asuransi = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];

            $file = $this->request->getFile('logo');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $logoName = uniqid() . '.' . $file->getExtension();
                $file->move('uploads/asuransi/', $logoName);

                if (!empty($asuransi['logo']) && file_exists('uploads/asuransi/' . $asuransi['logo'])) {
                    unlink('uploads/asuransi/' . $asuransi['logo']);
                }

                $data['logo'] = $logoName;
            }

            $model->update($id, $data);
            return redirect()->to('/admin/asuransi');
        }

        return view('admin/asuransi/edit', ['asuransi' => $asuransi]);
    }

    public function delete($id)
    {
        $model = new AsuransiModel();
        $asuransi = $model->find($id);

        if (!empty($asuransi['logo']) && file_exists('uploads/asuransi/' . $asuransi['logo'])) {
            unlink('uploads/asuransi/' . $asuransi['logo']);
        }

        $model->delete($id);
        return redirect()->to('/admin/asuransi');
    }
}
