<?php

namespace App\Controllers;

use App\Models\SchedulesModel;
use App\Models\DoctorModel;
use CodeIgniter\Controller;

class SchedulesController extends Controller
{
    public function index()
    {
        $model = new SchedulesModel();
        $schedules = $model->orderBy('created_at', 'DESC')->findAll();

        return view('admin/schedules/index', [
            'schedules' => $schedules
        ]);
    }

    public function create()
    {
        $doctorModel = new DoctorModel();
        $doctors = $doctorModel->findAll();

        return view('admin/schedules/create', [
            'doctors' => $doctors
        ]);
    }

    public function store()
    {
        $data = $this->request->getJSON(true);

        if (!$data || !is_array($data)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data tidak valid'
            ]);
        }

        $model = new \App\Models\SchedulesModel();
        $now = date('Y-m-d H:i:s');

        foreach ($data as $item) {
            $model->insert([
                'nama_dokter' => $item['name_dokter'] ?? '',
                'hari' => $item['hari'] ?? '',
                'jam_mulai' => $item['jam_mulai'] ?? '',
                'jam_selesai' => $item['jam_selesai'] ?? '',
                'keterangan' => $item['description'] ?? '',
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Jadwal berhasil disimpan'
        ]);
    }



    public function edit($id)
    {
        $model = new SchedulesModel();
        $schedule = $model->find($id);

        $doctorModel = new DoctorModel();
        $doctors = $doctorModel->findAll();

        return view('admin/schedules/edit', [
            'schedule' => $schedule,
            'doctors' => $doctors
        ]);
    }

    public function update($id)
    {
        $model = new SchedulesModel();

        $data = [
            'nama_dokter' => $this->request->getPost('name_dokter'),
            'hari'        => $this->request->getPost('hari'),
            'jam_mulai'   => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'keterangan' => $this->request->getPost('description'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('admin/schedules'))->with('success', 'Jadwal berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new SchedulesModel();
        $model->delete($id);

        return redirect()->to(base_url('admin/schedules'))->with('success', 'Jadwal berhasil dihapus');
    }
}
