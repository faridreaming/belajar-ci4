<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('layouts/home_layout', $data);
    }
}
