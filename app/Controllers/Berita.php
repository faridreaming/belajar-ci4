<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Berita extends BaseController
{
    public function index()
    {
        return view('admin/berita/index', [
            'title' => 'Berita',
            'admin' => $this->adminModel->first(),
            'list_berita' => $this->beritaModel->findAll(),
        ]);
    }
}
