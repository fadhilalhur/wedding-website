<?php
namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();
            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('admin'));
            } else {
                return view('auth/login', [
                    'error' => 'Username atau password salah',
                ]);
            }
        }
        return view('auth/login');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
