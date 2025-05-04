<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $tabel = [
            'Berita' => [
                'jumlahData' => $this->beritaModel->countAllResults(),
                'icon' => 'bi-newspaper'
            ],
            'Gambar' => [
                'jumlahData' => $this->gambarModel->countAllResults(),
                'icon' => 'bi-images'
            ]
        ];

        $data = [
            'title' => 'Dashboard Admin | RA Ar-Rayhan',
            'admin' => $this->adminModel->first(),
            'tabel' => $tabel
        ];
        return view('admin/dashboard', $data);
    }
}
