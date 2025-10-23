<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $usersModel = new UsersModel();
        $users = $usersModel->findAll();
        return view('admin/users/index', ['users' => $users]);
    }
    public function create()
    {
        return view('admin/users/create');
    }
    public function store()
    {
        $validation =  \Config\Services::validation();
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required',
        ];
        if (! $this->validate($rules)) {
            return view('admin/users/create', [
                'validation' => $this->validator
            ]);
        }
        $usersModel = new UsersModel();
        $usersModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ]);
        return redirect()->to(base_url('admin/users'))->with('success', 'User berhasil ditambah');
    }
    public function edit($id)
    {
        $usersModel = new UsersModel();
        $user = $usersModel->find($id);
        return view('admin/users/edit', ['user' => $user]);
    }
        
    public function update($id)
    {
        $usersModel = new UsersModel();
        $user = $usersModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'User tidak ditemukan');
        }
        $rules = [
            'username' => "required|min_length[3]|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role'     => 'required',
        ];
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ];
        $password = $this->request->getPost('password');
        if ($password) {
            if (strlen($password) < 6) {
                return view('admin/users/edit', [
                    'user' => $user,
                    'validation' => ['password' => 'Password minimal 6 karakter']
                ]);
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        if (! $this->validate($rules)) {
            return view('admin/users/edit', [
                'user' => $user,
                'validation' => $this->validator
            ]);
        }
        $usersModel->update($id, $data);
        return redirect()->to(base_url('admin/users'))->with('success', 'User berhasil diupdate');
    }
    public function delete($id)
    {
        $usersModel = new UsersModel();
        $user = $usersModel->find($id);
        if ($user) {
            $usersModel->delete($id);
            return redirect()->to(base_url('admin/users'))->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->to(base_url('admin/users'))->with('error', 'User tidak ditemukan');
        }
    }
    public function show($id)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User tidak ditemukan");
        }

        return view('admin/users/show', ['user' => $user]);
    }
}
