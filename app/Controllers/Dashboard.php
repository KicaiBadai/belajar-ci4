<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'username' => $session->get('username'),
            'role'     => $session->get('role'),
        ];
        return view('dashboard', $data);
    }
}
