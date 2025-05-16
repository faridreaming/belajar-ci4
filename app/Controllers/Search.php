<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getGet('q');
        
        // Initialize models you want to search through
        $db = \Config\Database::connect();
        
        if ($keyword) {
            // Search in multiple tables with proper joins
            $results = [
                'berita' => $db->table('berita b')
                    ->select('b.*, g.nama_file as nama_file_gambar, g.judul as judul_gambar')
                    ->join('gambar g', 'g.gambar_id = b.gambar_id', 'left')
                    ->groupStart()
                        ->like('b.judul', $keyword)
                        ->orLike('b.isi', $keyword)
                    ->groupEnd()
                    ->get()
                    ->getResult(),
                    
                'prestasi' => $db->table('prestasi p')
                    ->select('p.*, g.nama_file as nama_file_gambar, g.judul as judul_gambar')
                    ->join('gambar g', 'g.gambar_id = p.gambar_id', 'left')
                    ->groupStart()
                        ->like('p.prestasi', $keyword)
                        ->orLike('p.deskripsi', $keyword)
                        ->orLike('p.tingkat', $keyword)
                        ->orLike('p.jenis', $keyword)
                    ->groupEnd()
                    ->get()
                    ->getResult(),
                    
                'gambar' => $db->table('gambar')
                    ->like('judul', $keyword)
                    ->orLike('jenis', $keyword)
                    ->get()
                    ->getResult(),
            ];
        } else {
            $results = [];
        }

        return view('search/results', [
            'title' => 'Hasil Pencarian',
            'keyword' => $keyword,
            'results' => $results
        ]);
    }
} 