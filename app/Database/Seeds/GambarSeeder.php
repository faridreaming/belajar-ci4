<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GambarSeeder extends Seeder
{
    public function run()
    {
        $uploadPath = FCPATH . 'assets/img/upload/';
        $files = scandir($uploadPath);
        $data = [];

        foreach ($files as $file) {
            // Skip . and .. directories and default.jpg
            if ($file === '.' || $file === '..' || $file === 'default.jpg') {
                continue;
            }

            // Get file extension
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            
            // Skip if not an image file
            if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                continue;
            }

            // Generate title from filename
            $title = pathinfo($file, PATHINFO_FILENAME);
            $title = str_replace(['-', '_'], ' ', $title);
            $title = ucwords($title);

            // Determine type based on filename patterns
            $type = 'Dokumentasi'; // Default type
            if (strpos(strtolower($title), 'kelas') !== false) {
                $type = 'Kegiatan Belajar';
            } elseif (strpos(strtolower($title), 'kunjungan') !== false) {
                $type = 'Kunjungan';
            }

            $data[] = [
                'judul' => $title,
                'jenis' => $type,
                'nama_file' => $file,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }

        $this->db->table('gambar')->truncate();
        $this->db->table('gambar')->insertBatch($data);
    }
}
