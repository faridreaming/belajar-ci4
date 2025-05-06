<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GambarSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Kelas Durian',
                'jenis' => 'Dokumentasi',
                'nama_file' => 'kelas-durian.webp',
                'created_at' => '2023-10-01',
                'updated_at' => '2023-10-01',
            ],
            [
                'judul' => 'Kunjungan Mahasiswa TRPL-4C',
                'jenis' => 'Dokumentasi',
                'nama_file' => 'kunjungan-mahasiswa-trpl-4c.webp',
                'created_at' => '2023-10-01',
                'updated_at' => '2023-10-01',
            ],
        ];

        $this->db->table('gambar')->truncate();
        $this->db->table('gambar')->insertBatch($data);
    }
}
