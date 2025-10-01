<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TabelUser;

class Auth extends BaseController
{
    public function index()
    {
        // tampilan form login
        return view('login');
    }

    public function login()
    {
        $session = session();
        $userModel = new TabelUser();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->getUserByUsername($username);

        if ($user) {
            // password di database harus di-hash pakai password_hash()
            if (password_verify($password, $user['password'])) {
                $ses_data = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'email'     => $user['email'],
                    'role'    => $user['role'],
                    'logged_in'=> TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
