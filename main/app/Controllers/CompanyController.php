<?php
namespace App\Controllers;
use App\Models\CompanyModel;
class CompanyController extends BaseController
{
    public function index()
    {
        $companyModel = new CompanyModel();
        $company = $companyModel->first();
        return view('admin/company/index', ['company' => $company]);
    }
    public function edit()
    {
        $companyModel = new CompanyModel();
        $company = $companyModel->first();
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'phone' => $this->request->getPost('phone'),
                'maps_location' => $this->request->getPost('maps_location'),
            ];
            // Logo upload
            $logo = $this->request->getFile('logo');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                $logoName = $logo->getRandomName();
                $logo->move('uploads', $logoName);
                $data['logo'] = 'uploads/' . $logoName;
            }
            $companyModel->update($company['id'], $data);
            return redirect()->to('/admin/company')->with('success', 'Data perusahaan berhasil diupdate');
        }
        return view('admin/company/edit', ['company' => $company]);
    }
}
