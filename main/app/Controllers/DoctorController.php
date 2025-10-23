<?php

namespace App\Controllers;

use App\Models\DoctorModel;
use App\Models\SpesialisModel;
use App\Models\PoliMasterModel; // tambahkan ini di bagian atas

class DoctorController extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $doctors = $doctorModel->findAll();
        return view('admin/doctors/index', ['doctors' => $doctors]);
    }

    public function create()
    {

        if ($this->request->getMethod() === 'post') {
            $photoData = $this->request->getPost('photo_cropped');
            $photoName = null;

            if ($photoData) {
                $photoName = uniqid() . '.jpg';
                $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData));
                file_put_contents('uploads/doctor/' . $photoName, $image);
            }

            $doctorModel = new DoctorModel();
            $doctorModel->insert([
                'name' => $this->request->getPost('name'),
                'specialization' => $this->request->getPost('specialization'),
                'poli' => $this->request->getPost('poli'),
                'photo' => $photoName
            ]);


            return redirect()->to('/admin/doctors');
        }

        $poliModel = new PoliMasterModel();
        $polis = $poliModel->findAll();
        $spesialisModel = new SpesialisModel();
        $spesialis = $spesialisModel->findAll();
        return view('admin/doctors/create', ['spesialis' => $spesialis,  'polis' => $polis]);
    }

    // public function edit($id)
    // {
    //     $doctorModel = new DoctorModel();
    //     $doctor = $doctorModel->find($id);

    //     if ($this->request->getMethod() === 'post') {
    //         $data = [
    //             'name' => $this->request->getPost('name'),
    //             'specialization' => $this->request->getPost('specialization'),
    //             'poli' => $this->request->getPost('poli'),

    //         ];

    //         $photoData = $this->request->getPost('photo_cropped');
    //         if ($photoData) {
    //             $photoName = uniqid() . '.jpg';
    //             $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData));
    //             file_put_contents('uploads/doctor/' . $photoName, $image);

    //             if (!empty($doctor['photo']) && file_exists('uploads/doctor/' . $doctor['photo'])) {
    //                 unlink('uploads/doctor/' . $doctor['photo']);
    //             }

    //             $data['photo'] = $photoName;
    //         }

    //         $doctorModel->update($id, $data);
    //         return redirect()->to('/admin/doctors');
    //     }
    //     $poliModel = new PoliMasterModel();
    //     $polis = $poliModel->findAll();

    //     $spesialisModel = new SpesialisModel();
    //     $spesialis = $spesialisModel->findAll();

    //     return view('admin/doctors/edit', [
    //         'doctor' => $doctor,
    //         'spesialis' => $spesialis,
    //         'polis' => $polis
    //     ]);
    // }
    
    public function edit($id)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->find($id);
    
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name'           => $this->request->getPost('name'),
                'specialization' => $this->request->getPost('specialization'),
                'poli'           => $this->request->getPost('poli'),
            ];
    
            // ambil file dari input
            $photo = $this->request->getFile('photo');
    
            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                $photoName = $photo->getRandomName();
                $photo->move(FCPATH . 'uploads/doctor', $photoName);
    
                // hapus foto lama kalau ada
                if (!empty($doctor['photo']) && file_exists(FCPATH . 'uploads/doctor/' . $doctor['photo'])) {
                    unlink(FCPATH . 'uploads/doctor/' . $doctor['photo']);
                }
    
                $data['photo'] = $photoName;
            } else {
                // kalau tidak upload baru → pakai foto lama
                $data['photo'] = $doctor['photo'];
            }
    
            $doctorModel->update($id, $data);
            return redirect()->to('/admin/doctors')->with('success', 'Data dokter berhasil diperbarui.');
        }
    
        $poliModel = new PoliMasterModel();
        $polis = $poliModel->findAll();
    
        $spesialisModel = new SpesialisModel();
        $spesialis = $spesialisModel->findAll();
    
        return view('admin/doctors/edit', [
            'doctor'    => $doctor,
            'spesialis' => $spesialis,
            'polis'     => $polis
        ]);
    }


    public function delete($id)
    {
        $doctorModel = new DoctorModel();
        $doctor = $doctorModel->find($id);
        if (!empty($doctor['photo']) && file_exists('uploads/doctor/' . $doctor['photo'])) {
            unlink('uploads/doctor/' . $doctor['photo']);
        }
        $doctorModel->delete($id);
        return redirect()->to('/admin/doctors');
    }
}
