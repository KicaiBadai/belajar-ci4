<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TabelUser;

class TabelUsers extends BaseController
{
    public function index()
    {
        //
        $userModel = new TabelUser();
        $data['users'] = $userModel->getAllUsers();

        return view('users/list', $data);
    }
}
