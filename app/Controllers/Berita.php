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

    public function showEditForm($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        return view('admin/berita/edit', [
            'title' => 'Edit Berita',
            'admin' => $this->adminModel->first(),
            'list_gambar' => $this->gambarModel->findAll(),
            'berita' => $berita,
        ]);
    }

    public function edit($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        $rules = [
            'judul' => [
                'rules' => 'required|max_length[128]|is_unique[berita.judul,id,{id}]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong.',
                    'max_length' => 'Judul maksimal 128 karakter.',
                    'is_unique' => 'Judul sudah digunakan.',
                ],
            ],
            'isi' => [
                'rules' => 'required|max_length[5000]',
                'errors' => [
                    'required' => 'Isi berita tidak boleh kosong.',
                    'max_length' => 'Isi berita maksimal 5000 karakter.',
                ],
            ],
            'gambar_id' => [
                'rules' => 'permit_empty|integer',
                'errors' => [
                    'integer' => 'ID gambar harus berupa angka.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'slug'       => url_title($this->request->getPost('judul'), '-', true),
            'isi'        => $this->request->getPost('isi'),
            'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
            'updated_at' => date('Y-m-d'),
        ];

        $this->beritaModel->update($id, $data);
        $this->session->setFlashdata('success', 'Berita berhasil diperbarui.');
        return redirect()->to(base_url('admin/berita'));
    }


    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        $this->beritaModel->delete($id);
        $this->session->setFlashdata('success', 'Berita berhasil dihapus.');
        return redirect()->to(base_url('admin/berita'));
    }
}
