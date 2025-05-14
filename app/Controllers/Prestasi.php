<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Prestasi extends BaseController
{
    public function index()
    {
        $this->requireLogin();

        $search = $this->request->getGet('search');
        $query = $this->prestasiModel->getPrestasiWithGambar();

        if ($search) {
            $query = $query->like('prestasi.prestasi', $search)
                          ->orLike('prestasi.deskripsi', $search);
        }

        $data = [
            'title' => 'Prestasi',
            'admin' => $this->getCurrentAdmin(),
            'list_prestasi' => $query->paginate(5),
            'pager' => $query->pager,
            'search' => $search
        ];
        return view('admin/prestasi/index', $data);
    }

    public function showTambahForm()
    {
        $this->requireLogin();

        return view('admin/prestasi/tambah', [
            'title' => 'Tambah Prestasi',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->where('jenis', 'prestasi')->findAll(),
            'list_prestasi' => $this->prestasiModel->getPrestasiWithGambar(),
        ]);
    }

    public function tambah()
    {
        if (!$this->validate(
            [
                'prestasi' => [
                    'rules' => 'required|min_length[3]|max_length[128]|is_unique[prestasi.prestasi]',
                    'errors' => [
                        'required' => 'Nama prestasi harus diisi.',
                        'min_length' => 'Nama prestasi minimal 3 karakter.',
                        'max_length' => 'Nama prestasi maksimal 128 karakter.',
                        'is_unique' => 'Nama prestasi sudah ada.',
                    ],
                ],
                'tingkat' => [
                    'rules' => 'required|min_length[3]|max_length[128]',
                    'errors' => [
                        'required' => 'Tingkat prestasi harus diisi.',
                        'min_length' => 'Tingkat prestasi minimal 3 karakter.',
                        'max_length' => 'Tingkat prestasi maksimal 128 karakter.',
                    ],
                ],
                'jenis' => [
                    'rules' => 'required|min_length[3]|max_length[128]',
                    'errors' => [
                        'required' => 'Jenis prestasi harus diisi.',
                        'min_length' => 'Jenis prestasi minimal 3 karakter.',
                        'max_length' => 'Jenis prestasi maksimal 128 karakter.',
                    ],
                ],
                'deskripsi' => [
                    'rules' => 'required|min_length[10]|max_length[5000]',
                    'errors' => [
                        'required' => 'Deskripsi prestasi harus diisi.',
                        'min_length' => 'Deskripsi prestasi minimal 10 karakter.',
                        'max_length' => 'Deskripsi prestasi maksimal 5000 karakter.',
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
                'prestasi'   => $this->request->getPost('prestasi'),
                'tingkat'    => $this->request->getPost('tingkat'),
                'jenis'      => $this->request->getPost('jenis'),
                'deskripsi'  => $this->request->getPost('deskripsi'),
                'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->prestasiModel->insert($data);
            $this->session->setFlashdata('success', 'Prestasi berhasil ditambahkan.');
            return redirect()->to(base_url('admin/prestasi'));
        } catch (\Exception $e) {
            log_message('error', '[Prestasi::tambah] ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan prestasi.');
        }
    }

    public function showEditForm($id)
    {
        $this->requireLogin();
        
        $prestasi = $this->prestasiModel->find($id);

        if (!$prestasi) {
            return redirect()->to(base_url('admin/prestasi'))->with('error', 'Prestasi tidak ditemukan.');
        }

        return view('admin/prestasi/edit', [
            'title' => 'Edit Prestasi',
            'admin' => $this->getCurrentAdmin(),
            'list_gambar' => $this->gambarModel->where('jenis', 'prestasi')->findAll(),
            'prestasi' => $prestasi,
        ]);
    }

    public function edit($id)
    {
        $prestasiLama = $this->prestasiModel->find($id);

        if (!$prestasiLama) {
            return redirect()->to(base_url('admin/prestasi'))->with('error', 'Prestasi tidak ditemukan.');
        }

        $rules = [
            'prestasi' => [
                'rules' => 'required|min_length[3]|max_length[128]',
                'errors' => [
                    'required' => 'Nama prestasi harus diisi.',
                    'min_length' => 'Nama prestasi minimal 3 karakter.',
                    'max_length' => 'Nama prestasi maksimal 128 karakter.',
                ],
            ],
            'tingkat' => [
                'rules' => 'required|min_length[3]|max_length[128]',
                'errors' => [
                    'required' => 'Tingkat prestasi harus diisi.',
                    'min_length' => 'Tingkat prestasi minimal 3 karakter.',
                    'max_length' => 'Tingkat prestasi maksimal 128 karakter.',
                ],
            ],
            'jenis' => [
                'rules' => 'required|min_length[3]|max_length[128]',
                'errors' => [
                    'required' => 'Jenis prestasi harus diisi.',
                    'min_length' => 'Jenis prestasi minimal 3 karakter.',
                    'max_length' => 'Jenis prestasi maksimal 128 karakter.',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[10]|max_length[5000]',
                'errors' => [
                    'required' => 'Deskripsi prestasi harus diisi.',
                    'min_length' => 'Deskripsi prestasi minimal 10 karakter.',
                    'max_length' => 'Deskripsi prestasi maksimal 5000 karakter.',
                ],
            ],
            'gambar_id' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Gambar tidak valid.',
                ],
            ],
        ];

        if ($prestasiLama->prestasi !== $this->request->getPost('prestasi')) {
            $rules['prestasi']['rules'] .= '|is_unique[prestasi.prestasi]';
            $rules['prestasi']['errors']['is_unique'] = 'Nama prestasi sudah ada.';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $data = [
                'prestasi'   => $this->request->getPost('prestasi'),
                'tingkat'    => $this->request->getPost('tingkat'),
                'jenis'      => $this->request->getPost('jenis'),
                'deskripsi'  => $this->request->getPost('deskripsi'),
                'gambar_id'  => $this->request->getPost('gambar_id') ?: null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->prestasiModel->update($id, $data);
            $this->session->setFlashdata('success', 'Prestasi berhasil diperbarui.');
            return redirect()->to(base_url('admin/prestasi'));
        } catch (\Exception $e) {
            log_message('error', '[Prestasi::edit] ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui prestasi.');
        }
    }

    public function delete($id)
    {
        $prestasi = $this->prestasiModel->find($id);

        if (!$prestasi) {
            return redirect()->to(base_url('admin/prestasi'))->with('error', 'Prestasi tidak ditemukan.');
        }

        $this->prestasiModel->delete($id);
        $this->session->setFlashdata('success', 'Prestasi berhasil dihapus.');
        return redirect()->to(base_url('admin/prestasi'));
    }
} 