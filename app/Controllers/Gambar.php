<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Gambar extends BaseController
{
    public function index()
    {
        $this->requireLogin();

        $search = $this->request->getGet('search');
        $query = $this->gambarModel;

        if ($search) {
            $query = $query->like('judul', $search)
                ->orLike('jenis', $search);
        }

        $data = [
            'title' => 'Gambar',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $query->paginate(8),
            'pager' => $query->pager,
            'search' => $search
        ];
        return view('admin/gambar/index', $data);
    }

    public function showTambahForm()
    {
        $this->requireLogin();

        return view('admin/gambar/tambah', [
            'title' => 'Tambah Gambar',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->findAll(),
        ]);
    }

    public function tambah()
    {
        if (!$this->validate(
            [
                // 'judul' => [
                //     'rules' => 'is_unique[gambar.judul]',
                //     'errors' => [
                //         'is_unique' => 'Judul gambar sudah ada.',
                //     ],
                // ],
                'file_gambar' => [
                    'rules' => 'uploaded[file_gambar]|max_size[file_gambar,2048]|is_image[file_gambar]|mime_in[file_gambar,image/jpg,image/jpeg,image/png,image/webp]',
                    'errors' => [
                        'uploaded' => 'File gambar tidak boleh kosong.',
                        'max_size' => 'Ukuran file gambar maksimal 2MB.',
                        'is_image' => 'File yang diunggah bukan gambar.',
                        'mime_in' => 'Format gambar tidak didukung. Hanya JPG, JPEG, PNG, dan WebP yang diperbolehkan.',
                    ],
                ],
            ]
        )) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('file_gambar');
        $fileName = $fileGambar->getRandomName();
        $fileGambar->move('assets/img/upload', $fileName);
        $data = [
            'judul'      => $this->request->getPost('judul'),
            'jenis'      => $this->request->getPost('jenis'),
            'nama_file'  => $fileName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->gambarModel->insert($data);
        $this->session->setFlashdata('success', 'Gambar berhasil ditambahkan.');
        return redirect()->to(base_url('admin/gambar'));
    }

    public function showEditForm($id)
    {
        $this->requireLogin();

        $gambar = $this->gambarModel->find($id);

        if (!$gambar) {
            return redirect()->to(base_url('admin/gambar'))->with('error', 'Gambar tidak ditemukan.');
        }

        return view('admin/gambar/edit', [
            'title' => 'Edit Gambar',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->findAll(),
            'gambar' => $gambar,
        ]);
    }

    public function edit($id)
    {
        $gambarLama = $this->request->getPost('gambar_lama');
        $fileGambar = $this->request->getFile('file_gambar');

        if ($fileGambar->isValid()) {
            if (!$this->validate(
                [
                    'file_gambar' => [
                        'rules' => 'max_size[file_gambar,2048]|is_image[file_gambar]|mime_in[file_gambar,image/jpg,image/jpeg,image/png,image/webp]',
                        'errors' => [
                            'max_size' => 'Ukuran file gambar maksimal 2MB.',
                            'is_image' => 'File yang diunggah bukan gambar.',
                            'mime_in' => 'Format gambar tidak didukung. Hanya JPG, JPEG, PNG, dan WebP yang diperbolehkan.',
                        ],
                    ],
                ]
            )) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $fileName = $fileGambar->getRandomName();
            $fileGambar->move('assets/img/upload', $fileName);
            if (file_exists('assets/img/upload/' . $gambarLama)) {
                unlink('assets/img/upload/' . $gambarLama);
            }
        } else {
            $fileName = $gambarLama;
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'jenis'      => $this->request->getPost('jenis'),
            'nama_file'  => $fileName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->gambarModel->update($id, $data);
        $this->session->setFlashdata('success', 'Gambar berhasil diubah.');
        return redirect()->to(base_url('admin/gambar'));
    }


    public function delete($id)
    {
        $gambar = $this->gambarModel->find($id);

        if (!$gambar) {
            return redirect()->to(base_url('admin/gambar'))->with('error', 'Gambar tidak ditemukan.');
        }

        // Get database instance
        $db = \Config\Database::connect();

        // Start a database transaction
        $db->transStart();

        try {
            // Set gambar_id to null in berita table
            $db->table('berita')
                ->where('gambar_id', $id)
                ->update(['gambar_id' => null]);

            // Set gambar_id to null in prestasi table
            $db->table('prestasi')
                ->where('gambar_id', $id)
                ->update(['gambar_id' => null]);

            // Delete the image file
            if (file_exists('assets/img/upload/' . $gambar->nama_file)) {
                unlink('assets/img/upload/' . $gambar->nama_file);
            }

            // Delete the gambar record
            $this->gambarModel->delete($id);

            // Commit the transaction
            $db->transCommit();

            $this->session->setFlashdata('success', 'Gambar berhasil dihapus.');
        } catch (\Exception $e) {
            // Rollback the transaction if any error occurs
            $db->transRollback();
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menghapus gambar.');
        }

        return redirect()->to(base_url('admin/gambar'));
    }
}
