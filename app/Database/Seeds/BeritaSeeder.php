<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        // Get all gambar IDs from the gambar table
        $gambarIds = $this->db->table('gambar')->select('gambar_id')->get()->getResultArray();
        $gambarIds = array_column($gambarIds, 'gambar_id');

        $data = [
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Belajar RA Ar-Rayhan Dimulai',
                'slug'       => 'kegiatan-belajar-ra-dimulai',
                'isi'        => 'Tahun ajaran baru telah dimulai di RA Ar-Rayhan. Anak-anak sangat antusias mengikuti kegiatan belajar sambil bermain yang menyenangkan dan edukatif.',
                'created_at' => '2025-01-10',
                'updated_at' => '2025-01-13',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'TPQ Ar-Rayhan Laksanakan Khatam Al-Qur\'an',
                'slug'       => 'tpq-khatam-al-quran',
                'isi'        => 'TPQ Ar-Rayhan sukses melaksanakan acara khatam Al-Qur\'an yang diikuti oleh 15 santri. Acara berlangsung khidmat dan penuh haru dengan dihadiri oleh para wali santri.',
                'created_at' => '2025-02-05',
                'updated_at' => '2025-02-20',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'RA Ar-Rayhan Adakan Lomba Hari Anak Nasional',
                'slug'       => 'lomba-hari-anak-nasional-ra',
                'isi'        => 'Dalam rangka memperingati Hari Anak Nasional, RA Ar-Rayhan mengadakan lomba mewarnai dan menyanyi yang diikuti oleh seluruh siswa. Kegiatan ini bertujuan untuk menumbuhkan kepercayaan diri dan kreativitas anak.',
                'created_at' => '2025-03-17',
                'updated_at' => '2025-03-18',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Penerimaan Siswa Baru TPQ dan RA Ar-Rayhan Dibuka',
                'slug'       => 'pendaftaran-siswa-baru-dibuka',
                'isi'        => 'Yayasan Ar-Rayhan Medan resmi membuka pendaftaran siswa baru untuk jenjang RA dan TPQ. Informasi lebih lanjut dapat dilihat di halaman pendaftaran website kami.',
                'created_at' => '2025-04-01',
                'updated_at' => '2025-04-10',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kunjungan Edukatif ke Taman Baca',
                'slug'       => 'kunjungan-edukatif-taman-baca',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan melakukan kunjungan edukatif ke Taman Baca Kota Medan. Kegiatan ini bertujuan untuk menumbuhkan minat baca sejak dini.',
                'created_at' => '2025-04-15',
                'updated_at' => '2025-04-16',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Maulid Nabi Muhammad SAW',
                'slug'       => 'peringatan-maulid-nabi',
                'isi'        => 'RA Ar-Rayhan mengadakan peringatan Maulid Nabi Muhammad SAW dengan berbagai kegiatan keislaman. Anak-anak tampil dalam berbagai penampilan islami.',
                'created_at' => '2025-05-10',
                'updated_at' => '2025-05-12',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Outbound di Taman Rekreasi',
                'slug'       => 'kegiatan-outbound-taman-rekreasi',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan mengikuti kegiatan outbound di Taman Rekreasi. Kegiatan ini melatih keberanian dan kerja sama tim.',
                'created_at' => '2025-05-20',
                'updated_at' => '2025-05-21',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Pentas Seni Akhir Tahun',
                'slug'       => 'pentas-seni-akhir-tahun',
                'isi'        => 'RA Ar-Rayhan menggelar pentas seni akhir tahun yang menampilkan berbagai bakat siswa dalam bidang seni dan budaya.',
                'created_at' => '2025-06-15',
                'updated_at' => '2025-06-16',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Workshop Parenting untuk Orang Tua',
                'slug'       => 'workshop-parenting-orang-tua',
                'isi'        => 'RA Ar-Rayhan menyelenggarakan workshop parenting untuk orang tua siswa. Workshop ini membahas tentang pola asuh anak usia dini.',
                'created_at' => '2025-06-20',
                'updated_at' => '2025-06-21',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Manasik Haji',
                'slug'       => 'kegiatan-manasik-haji',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan mengikuti kegiatan manasik haji. Kegiatan ini bertujuan untuk mengenalkan rukun Islam kelima sejak dini.',
                'created_at' => '2025-07-01',
                'updated_at' => '2025-07-02',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Hari Kemerdekaan RI',
                'slug'       => 'peringatan-hari-kemerdekaan-ri',
                'isi'        => 'RA Ar-Rayhan mengadakan berbagai lomba dalam rangka memperingati Hari Kemerdekaan RI. Anak-anak sangat antusias mengikuti lomba-lomba tradisional.',
                'created_at' => '2025-08-17',
                'updated_at' => '2025-08-18',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kunjungan Edukatif ke Kebun Binatang',
                'slug'       => 'kunjungan-kebun-binatang',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan melakukan kunjungan edukatif ke Kebun Binatang Medan. Kegiatan ini bertujuan untuk mengenalkan berbagai jenis hewan kepada anak-anak.',
                'created_at' => '2025-09-05',
                'updated_at' => '2025-09-06',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Hari Guru Nasional',
                'slug'       => 'peringatan-hari-guru-nasional',
                'isi'        => 'RA Ar-Rayhan mengadakan peringatan Hari Guru Nasional dengan berbagai penampilan dari siswa untuk menghormati jasa para guru.',
                'created_at' => '2025-11-25',
                'updated_at' => '2025-11-26',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Memasak Bersama',
                'slug'       => 'kegiatan-memasak-bersama',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan mengikuti kegiatan memasak bersama. Kegiatan ini melatih kemandirian dan kreativitas anak dalam menyiapkan makanan sehat.',
                'created_at' => '2025-10-15',
                'updated_at' => '2025-10-16',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Tahun Baru Hijriah',
                'slug'       => 'peringatan-tahun-baru-hijriah',
                'isi'        => 'RA Ar-Rayhan mengadakan peringatan Tahun Baru Hijriah dengan berbagai kegiatan keislaman dan pembagian hadiah untuk siswa.',
                'created_at' => '2025-07-19',
                'updated_at' => '2025-07-20',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Berkebun di Sekolah',
                'slug'       => 'kegiatan-berkebun-sekolah',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan belajar berkebun di area sekolah. Kegiatan ini mengajarkan anak-anak untuk mencintai lingkungan dan tanaman.',
                'created_at' => '2025-09-20',
                'updated_at' => '2025-09-21',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Hari Pahlawan',
                'slug'       => 'peringatan-hari-pahlawan',
                'isi'        => 'RA Ar-Rayhan mengadakan peringatan Hari Pahlawan dengan berbagai kegiatan untuk menanamkan nilai-nilai kepahlawanan kepada anak-anak.',
                'created_at' => '2025-11-10',
                'updated_at' => '2025-11-11',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Membatik',
                'slug'       => 'kegiatan-membatik',
                'isi'        => 'Siswa-siswi RA Ar-Rayhan belajar membatik dalam rangka melestarikan budaya Indonesia. Anak-anak sangat antusias mencoba teknik membatik sederhana.',
                'created_at' => '2025-10-02',
                'updated_at' => '2025-10-03',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Peringatan Hari Kartini',
                'slug'       => 'peringatan-hari-kartini',
                'isi'        => 'RA Ar-Rayhan mengadakan peringatan Hari Kartini dengan berbagai kegiatan yang menampilkan peran perempuan dalam pendidikan dan masyarakat.',
                'created_at' => '2025-04-21',
                'updated_at' => '2025-04-22',
            ],
            [
                'gambar_id'  => $gambarIds[array_rand($gambarIds)],
                'judul'      => 'Kegiatan Mengaji Bersama',
                'slug'       => 'kegiatan-mengaji-bersama',
                'isi'        => 'RA Ar-Rayhan mengadakan kegiatan mengaji bersama untuk meningkatkan kemampuan membaca Al-Qur\'an siswa. Kegiatan ini diikuti oleh seluruh siswa dengan penuh semangat.',
                'created_at' => '2025-08-05',
                'updated_at' => '2025-08-06',
            ]
        ];

        $this->db->table('berita')->truncate();
        $this->db->table('berita')->insertBatch($data);
    }
}
