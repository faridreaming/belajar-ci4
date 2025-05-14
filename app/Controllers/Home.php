<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        $berita = $this->beritaModel->getBeritaWithGambar()->orderBy('berita.created_at', 'DESC')->limit(5)->find();
        $data = [
            'title' => 'Beranda',
            'berita' => $berita,
        ];
        return view('home/beranda', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
        ];
        return view('home/profil', $data);
    }

    public function prestasi()
    {
        $prestasi = $this->prestasiModel->getPrestasiWithGambar()->orderBy('prestasi.created_at', 'DESC')->findAll();
        
        // Group prestasi by jenis
        $prestasiByJenis = [
            'Prestasi Siswa' => [],
            'Prestasi Pengajar' => [],
            'Prestasi Lembaga' => []
        ];

        foreach ($prestasi as $p) {
            $prestasiByJenis[$p->jenis][] = $p;
        }

        $data = [
            'title' => 'Prestasi',
            'prestasiByJenis' => $prestasiByJenis,
        ];
        return view('home/prestasi', $data);
    }

    public function prestasiDetail($slug)
    {
        $prestasi = $this->prestasiModel->getPrestasiWithGambar()
            ->where('prestasi.slug', $slug)
            ->first();

        if (!$prestasi) {
            return redirect()->to(base_url('prestasi'))->with('error', 'Prestasi tidak ditemukan.');
        }

        $data = [
            'title' => $prestasi->prestasi,
            'prestasi' => $prestasi,
        ];
        return view('home/prestasi_detail', $data);
    }
}
