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
    'nama_file' => '1747361741_c7c81d4e93106342ec8c.webp',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-16 09:15:41',
  ),
  1 => 
  array (
    'gambar_id' => '2',
    'judul' => 'Juara Lomba Tahfidz dan Mewarnai	',
    'jenis' => 'Prestasi',
    'nama_file' => '1747361992_73166a2bd21614d98ddc.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-16 09:19:52',
  ),
  2 => 
  array (
    'gambar_id' => '3',
    'judul' => 'Juara Tahfidz TK',
    'jenis' => 'Prestasi',
    'nama_file' => '1747362067_6ffb9220729e3d346843.jpg',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-16 09:21:07',
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
  5 => 
  array (
    'gambar_id' => '6',
    'judul' => 'Prestasi GTK Cabang Lomba Mewarnai',
    'jenis' => 'Prestasi',
    'nama_file' => '1747362108_75a954242d8c3dc16e6a.jpg',
    'created_at' => '2025-05-14 12:52:40',
    'updated_at' => '2025-05-16 09:21:48',
  ),
  6 => 
  array (
    'gambar_id' => '7',
    'judul' => 'Penerimaan Peserta Didik Baru RA Ar-Rayhan',
    'jenis' => 'Lainnya',
    'nama_file' => '1747362118_fe759398d5a17b482389.jpg',
    'created_at' => '2025-05-16 08:35:50',
    'updated_at' => '2025-05-16 09:21:58',
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
