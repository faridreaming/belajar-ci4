<?php

namespace App\Controllers;

use App\Models\GambarModel;

class Galeri extends BaseController
{
    protected $gambarModel;

    public function __construct()
    {
        $this->gambarModel = new GambarModel();
    }

    public function index()
    {
        // Get all unique jenis values
        $db = \Config\Database::connect();
        $jenisTypes = $db->table('gambar')
            ->select('DISTINCT(jenis)')
            ->where('jenis !=', 'Lainnya')
            ->orderBy('jenis', 'ASC')
            ->get()
            ->getResultArray();

        // Add 'Lainnya' at the end if it exists
        $lainnya = $db->table('gambar')
            ->select('DISTINCT(jenis)')
            ->where('jenis', 'Lainnya')
            ->get()
            ->getResultArray();

        if (!empty($lainnya)) {
            $jenisTypes = array_merge($jenisTypes, $lainnya);
        }

        // Get the active tab from URL, default to first jenis if not set
        $activeJenis = $this->request->getGet('jenis') ?? 
            (count($jenisTypes) > 0 ? $jenisTypes[0]['jenis'] : '');

        // Set up pagination
        $perPage = 12; // Number of images per page
        $currentPage = $this->request->getGet('page') ?? 1;

        // Get images for the active jenis with pagination
        $images = $this->gambarModel
            ->where('jenis', $activeJenis)
            ->paginate($perPage, 'galeri');

        $data = [
            'title' => 'Galeri',
            'jenisTypes' => $jenisTypes,
            'activeJenis' => $activeJenis,
            'images' => $images,
            'pager' => $this->gambarModel->pager
        ];

        return view('galeri/index', $data);
    }
} 