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
            'list_berita' => $this->beritaModel->getBeritaWithGambar(),
        ]);
    }

    public function showTambahForm()
    {
        return view('admin/berita/tambah', [
            'title' => 'Tambah Berita',
            'admin' => $this->adminModel->first(),
            'list_gambar' => $this->gambarModel->findAll(),
            'list_berita' => $this->beritaModel->getBeritaWithGambar(),
        ]);
    }

    public function tambah()
    {
        if (!$this->validate(
            [
                'judul' => [
                    'rules' => 'is_unique[berita.judul]',
                    'errors' => [
                        'is_unique' => 'Judul berita sudah ada.',
                    ],
                ],
            ]
        )) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'slug'       => url_title($this->request->getPost('judul'), '-', true),
            'isi'        => $this->request->getPost('isi'),
            'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ];

        $this->beritaModel->insert($data);
        $this->session->setFlashdata('success', 'Berita berhasil ditambahkan.');
        return redirect()->to(base_url('admin/berita'));
    }
}
