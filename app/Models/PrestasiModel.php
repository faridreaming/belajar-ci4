<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table            = 'prestasi';
    protected $primaryKey       = 'prestasi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['gambar_id', 'prestasi', 'slug', 'tingkat', 'jenis', 'deskripsi', 'created_at', 'updated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['generateSlug'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['generateSlug'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Custom methods
    public function getPrestasiWithGambar()
    {
        return $this->select('prestasi.*, gambar.judul as judul_gambar, gambar.nama_file as nama_file_gambar')
            ->join('gambar', 'gambar.gambar_id = prestasi.gambar_id', 'left')
            ->orderBy('updated_at', 'desc');
    }

    protected function generateSlug(array $data)
    {
        if (isset($data['data']['prestasi'])) {
            $slug = url_title($data['data']['prestasi'], '-', true);
            $count = 1;

            // Check if the slug already exists
            while ($this->where('slug', $slug)->where('prestasi_id !=', $data['id'] ?? 0)->first()) {
                $slug = url_title($data['data']['prestasi'], '-', true) . '-' . $count++;
            }

            $data['data']['slug'] = $slug;
        }

        return $data;
    }
} 