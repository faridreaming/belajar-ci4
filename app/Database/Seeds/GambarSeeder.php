<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GambarSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'gambar_id' => '1',
    'judul' => 'Kunjungan Mahasiswa TRPL-4C',
    'jenis' => 'Lainnya',
    'nama_file' => '1747182774_0e60762ef7702ced6778.webp',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-14 07:57:30',
  ),
  1 => 
  array (
    'gambar_id' => '2',
    'judul' => 'Juara Lomba Tahfidz dan Mewarnai	',
    'jenis' => 'Prestasi',
    'nama_file' => '1747183497_d928bfd0d4968c32be22.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-14 07:57:30',
  ),
  2 => 
  array (
    'gambar_id' => '3',
    'judul' => 'Juara Tahfidz TK',
    'jenis' => 'Prestasi',
    'nama_file' => '1747183684_471fc20be797ea29bf51.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-14 07:57:30',
  ),
  3 => 
  array (
    'gambar_id' => '4',
    'judul' => 'Juara Tahfidz Tingkat TK',
    'jenis' => 'Prestasi',
    'nama_file' => '1747183706_d19fd8e52745c9c6ebaa.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-14 07:57:30',
  ),
  4 => 
  array (
    'gambar_id' => '5',
    'judul' => 'Juara Surah Al Fatihah Putra',
    'jenis' => 'Prestasi',
    'nama_file' => '1747183759_8d2a839578cd42429c30.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-14 07:57:30',
  ),
);

        // Handle datetime fields
        foreach ($data as &$row) {
            if (empty($row['created_at'])) {
                $row['created_at'] = date('Y-m-d H:i:s');
            }
            if (empty($row['updated_at'])) {
                $row['updated_at'] = date('Y-m-d H:i:s');
            }
        }

        $this->db->table('gambar')->insertBatch($data);
    }
}
