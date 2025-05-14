<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'prestasi_id' => '1',
    'gambar_id' => '2',
    'prestasi' => 'Juara Umum Gebyar Maulid Tingkat TK. SMK TELKOM 2 MEDAN',
    'slug' => 'juara-umum-gebyar-maulid-tingkat-tk-smk-telkom-2-medan',
    'tingkat' => 'Kabupaten/Kota',
    'jenis' => 'Prestasi Lembaga',
    'deskripsi' => 'Juara Lomba Tahfidz dan Mewarnai',
    'created_at' => '2025-05-14 07:57:53',
    'updated_at' => '2025-05-14 07:57:53',
  ),
  1 => 
  array (
    'prestasi_id' => '2',
    'gambar_id' => '3',
    'prestasi' => 'Juara Favorit 1 Lomba Tahfidz Al Umm Smart Center',
    'slug' => 'juara-favorit-1-lomba-tahfidz-al-umm-smart-center',
    'tingkat' => 'Nasional',
    'jenis' => 'Prestasi Siswa',
    'deskripsi' => 'Juara Tahfidz TK',
    'created_at' => '2025-05-14 07:57:48',
    'updated_at' => '2025-05-14 07:57:48',
  ),
  2 => 
  array (
    'prestasi_id' => '3',
    'gambar_id' => '4',
    'prestasi' => 'Juara Favorit 2 Lomba Tahfidz Al Umm Smart Center',
    'slug' => 'juara-favorit-2-lomba-tahfidz-al-umm-smart-center',
    'tingkat' => 'Nasional',
    'jenis' => 'Prestasi Siswa',
    'deskripsi' => 'Juara Tahfidz Tingkat TK',
    'created_at' => '2025-05-14 07:57:39',
    'updated_at' => '2025-05-14 07:57:39',
  ),
  3 => 
  array (
    'prestasi_id' => '5',
    'gambar_id' => '5',
    'prestasi' => 'Juara 1 Surah Al Fatihah Putra Porseni IGRA XVIII Tingkat Kota Medan',
    'slug' => 'juara-1-surah-al-fatihah-putra-porseni-igra-xviii-tingkat-kota-medan',
    'tingkat' => 'Kabupaten/Kota',
    'jenis' => 'Prestasi Siswa',
    'deskripsi' => 'Juara Surah Al-Fatihah Putra',
    'created_at' => '2025-05-14 07:57:13',
    'updated_at' => '2025-05-14 07:57:13',
  ),
);

        // Handle datetime fields
        $this->db->table('prestasi')->insertBatch($data);
    }
}
