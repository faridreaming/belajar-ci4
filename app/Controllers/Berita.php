<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Berita extends BaseController
{
    public function index()
    {
        $this->requireLogin();

        $data = [
            'title' => 'Berita',
            'admin' => $this->getCurrentAdmin(),
            'list_berita' => $this->beritaModel->getBeritaWithGambar()->paginate(5),
            'pager' => $this->beritaModel->pager,
        ];
        return view('admin/berita/index', $data);
    }

    public function showTambahForm()
    {
        $this->requireLogin();

        return view('admin/berita/tambah', [
            'title' => 'Tambah Berita',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->findAll(),
            'list_berita' => $this->beritaModel->getBeritaWithGambar(),
        ]);
    }

    public function tambah()
    {
        if (!$this->validate(
            [
                'judul' => [
                    'rules' => 'required|min_length[3]|max_length[128]|is_unique[berita.judul]',
                    'errors' => [
                        'required' => 'Judul berita harus diisi.',
                        'min_length' => 'Judul berita minimal 3 karakter.',
                        'max_length' => 'Judul berita maksimal 128 karakter.',
                        'is_unique' => 'Judul berita sudah ada.',
                    ],
                ],
                'isi' => [
                    'rules' => 'required|min_length[10]|max_length[5000]',
                    'errors' => [
                        'required' => 'Isi berita harus diisi.',
                        'min_length' => 'Isi berita minimal 10 karakter.',
                        'max_length' => 'Isi berita maksimal 5000 karakter.',
                    ],
                ],
                'gambar_id' => [
                    'rules' => 'permit_empty|numeric',
                    'errors' => [
                        'numeric' => 'Gambar tidak valid.',
                    ],
                ],
            ]
        )) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $data = [
                'judul'      => $this->request->getPost('judul'),
                'slug'       => url_title($this->request->getPost('judul'), '-', true),
                'isi'        => $this->request->getPost('isi'),
                'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->beritaModel->insert($data);
            $this->session->setFlashdata('success', 'Berita berhasil ditambahkan.');
            return redirect()->to(base_url('admin/berita'));
        } catch (\Exception $e) {
            log_message('error', '[Berita::tambah] ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan berita.');
        }
    }

    public function showEditForm($id)
    {
        $this->requireLogin();
        
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        return view('admin/berita/edit', [
            'title' => 'Edit Berita',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->findAll(),
            'berita' => $berita,
        ]);
    }

    public function edit($id)
    {
        $beritaLama = $this->beritaModel->find($id);

        if (!$beritaLama) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan.');
        }

        // Validasi hanya jika judul diubah
        $rules = [
            'judul' => [
                'rules' => 'required|min_length[3]|max_length[128]',
                'errors' => [
                    'required' => 'Judul berita harus diisi.',
                    'min_length' => 'Judul berita minimal 3 karakter.',
                    'max_length' => 'Judul berita maksimal 128 karakter.',
                ],
            ],
            'isi' => [
                'rules' => 'required|min_length[10]|max_length[5000]',
                'errors' => [
                    'required' => 'Isi berita harus diisi.',
                    'min_length' => 'Isi berita minimal 10 karakter.',
                    'max_length' => 'Isi berita maksimal 5000 karakter.',
                ],
            ],
            'gambar_id' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Gambar tidak valid.',
                ],
            ],
        ];

        // Tambahkan validasi is_unique hanya jika judul berubah
        if ($beritaLama['judul'] !== $this->request->getPost('judul')) {
            $rules['judul']['rules'] .= '|is_unique[berita.judul]';
            $rules['judul']['errors']['is_unique'] = 'Judul berita sudah ada.';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $data = [
                'judul'      => $this->request->getPost('judul'),
                'slug'       => url_title($this->request->getPost('judul'), '-', true),
                'isi'        => $this->request->getPost('isi'),
                'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->beritaModel->update($id, $data);
            $this->session->setFlashdata('success', 'Berita berhasil diperbarui.');
            return redirect()->to(base_url('admin/berita'));
        } catch (\Exception $e) {
            log_message('error', '[Berita::edit] ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui berita.');
        }
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
