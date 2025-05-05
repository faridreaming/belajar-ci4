<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\GambarModel;
use App\Models\MediaModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $beritaModel = new \App\Models\BeritaModel();
        $beritaTerbaru = $beritaModel->select('berita.*, gambar.judul as judul_gambar, gambar.nama_file as nama_file_gambar')
        ->join('gambar', 'gambar.gambar_id = berita.gambar_id', 'left')
        ->orderBy('updated_at', 'desc')
        ->first();;
        $beritaLainnya = $beritaModel->orderBy('created_at', 'DESC')->findAll(4, 1); // Ambil 4 berita lain selain yang pertama
    
        return view('home/home', [
            'beritaTerbaru' => $beritaTerbaru,
            'beritaLainnya' => $this->beritaModel->getBeritaWithGambar(),
        ]);
    }

    public function cari()
    {
        return view('search', ['title' => 'Hasil Pencarian']);
    }

    public function maintenance()
    {
        return view('maintenance');
    }

    public function tentang()
    {
        return view('tentang', ['title' => 'Tentang']);
    }

    public function search()
    {
        $query = $this->request->getGet('q');
        $beritaModel = new BeritaModel();

        $results = [];

        if ($query) {
            $results = $beritaModel
                ->like('judul', $query)
                ->orLike('kategori', $query)
                ->select('id, judul, kategori')
                ->findAll(10);
        }

        return $this->response->setJSON($results);
    }

    public function berita()
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->findAll();

        return view('home/berita', [
            'title' => 'Berita',
            'berita' => $berita
        ]);
    }

    public function mediaInformasi()
    {
        return view('media-informasi', ['title' => 'Media Informasi']);
    }

    public function galeri()
    {
        return view('galeri', ['title' => 'Galeri']);
    }

    public function kontak()
    {
        return view('kontak', ['title' => 'Kontak']);
    }

    // ===== Login & Dashboard =====
    public function login()
    {
        return view('login', ['title' => 'Login']);
    }

    // public function process()
    // {
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     $userModel = new UserModel();
    //     $user = $userModel->where('username', $username)->first();

    //     if (!$user || $user['password'] !== $password) {
    //         return redirect()->back()->with('error', 'Username atau password salah');
    //     }

    //     session()->set('isLoggedIn', true);
    //     session()->set('username', $username);

    //     return redirect()->to('/dashboard');
    // }

    // public function dashboard()
    // {
    //     if (!session()->get('isLoggedIn')) {
    //         return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    //     }

    //     $beritaModel = new BeritaModel();
    //     $gambarModel = new GambarModel();

    //     $totalBerita = $beritaModel->countAll();
    //     $totalGambar = $gambarModel->countAll();

    //     return view('dashboard', [
    //         'title' => 'Dashboard Admin',
    //         'totalBerita' => $totalBerita,
    //         'totalGambar' => $totalGambar
    //     ]);
    // }

    // public function logout()
    // {
    //     session()->destroy();
    //     return redirect()->to('/login')->with('success', 'Anda telah logout');
    // }
}