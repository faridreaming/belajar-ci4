<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'gambar_id'  => 1,
                'judul'      => 'Kegiatan Belajar RA Ar-Rayhan Dimulai',
                'slug'       => 'kegiatan-belajar-ra-dimulai',
                'isi'        => 'Tahun ajaran baru telah dimulai di RA Ar-Rayhan. Anak-anak sangat antusias mengikuti kegiatan belajar sambil bermain yang menyenangkan dan edukatif.',
                'created_at' => '2025-01-10',
                'updated_at' => '2025-01-13',
            ],
            [
                'gambar_id'  => 2,
                'judul'      => 'TPQ Ar-Rayhan Laksanakan Khatam Al-Qur\'an',
                'slug'       => 'tpq-khatam-al-quran',
                'isi'        => 'TPQ Ar-Rayhan sukses melaksanakan acara khatam Al-Qur\'an yang diikuti oleh 15 santri. Acara berlangsung khidmat dan penuh haru dengan dihadiri oleh para wali santri.',
                'created_at' => '2025-02-05',
                'updated_at' => '2025-02-20',
            ],
            [
                'gambar_id'  => null,
                'judul'      => 'RA Ar-Rayhan Adakan Lomba Hari Anak Nasional',
                'slug'       => 'lomba-hari-anak-nasional-ra',
                'isi'        => 'Dalam rangka memperingati Hari Anak Nasional, RA Ar-Rayhan mengadakan lomba mewarnai dan menyanyi yang diikuti oleh seluruh siswa. Kegiatan ini bertujuan untuk menumbuhkan kepercayaan diri dan kreativitas anak.',
                'created_at' => '2025-03-17',
                'updated_at' => '2025-03-18',
            ],
            [
                'gambar_id'  => null,
                'judul'      => 'Penerimaan Siswa Baru TPQ dan RA Ar-Rayhan Dibuka',
                'slug'       => 'pendaftaran-siswa-baru-dibuka',
                'isi'        => 'Yayasan Ar-Rayhan Medan resmi membuka pendaftaran siswa baru untuk jenjang RA dan TPQ. Informasi lebih lanjut dapat dilihat di halaman pendaftaran website kami.',
                'created_at' => '2025-04-01',
                'updated_at' => '2025-04-10',
            ]
        ];

        $this->db->table('berita')->truncate();
        $this->db->table('berita')->insertBatch($data);
    }
}
