<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function showLoginForm()
    {
        if ($this->session->get('admin_id')) {
            return redirect()->to(base_url('admin'));
        }

        return view('login/login');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->where('email', $email)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        if ($password !== $admin->password) {
            return redirect()->back()->with('error', 'Password salah');
        }

        // Set session
        $this->session->set([
            'admin_id' => $admin->admin_id,
            'username' => $admin->username,
            'email' => $admin->email
        ]);

        return redirect()->to(base_url('admin'))->with('success', 'Login berhasil');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth/login'))->with('success', 'Logout berhasil');
    }
}
