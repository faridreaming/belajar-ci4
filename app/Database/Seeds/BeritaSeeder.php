<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'berita_id' => '1',
    'gambar_id' => '1',
    'judul' => 'Kunjungan Mahasiswa TRPL-4C dari Politeknik Negeri Medan ke RA Ar-Rayhan',
    'slug' => 'kunjungan-mahasiswa-trpl-4c-dari-politeknik-negeri-medan-ke-ra-ar-rayhan',
    'isi' => 'Pada hari Kamis, 27 Februari 2025, mahasiswa semester 4 dari Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL), Politeknik Negeri Medan, kelas TRPL-4C, melakukan kunjungan ke RA Ar-Rayhan Medan. Adapun mahasiswa yang hadir dalam kunjungan tersebut adalah:
- Ahmad Reza Aulia Siregar (Reza)
- M. Sibawaihi Shiddiq Tarigan (Shiddiq)
- Muhammad Farid Yamin (Farid)
- Muhammad Fattah (Fattah)

Tujuan dari kunjungan ini adalah untuk melakukan wawancara dengan pihak pengelola RA Ar-Rayhan terkait pengembangan website resmi lembaga. Pembuatan website ini merupakan bagian dari tugas akhir mata kuliah Analisis dan Perancangan Perangkat Lunak yang sedang dijalani oleh para mahasiswa.

Wawancara dilakukan untuk menggali kebutuhan pengguna terkait sistem informasi yang akan dibangun. Saat ini, RA Ar-Rayhan hanya mengandalkan media sosial seperti Instagram, Facebook, YouTube, dan TikTok sebagai sarana penyebaran informasi. Meskipun media sosial cukup efektif dalam menjangkau masyarakat, penggunaannya memiliki keterbatasan dalam hal pengorganisasian informasi dan kemudahan akses bagi calon wali murid atau pihak yang membutuhkan informasi resmi mengenai yayasan.

Oleh karena itu, diperlukan adanya website resmi yang dapat menjadi pusat informasi terstruktur mengenai RA Ar-Rayhan. Website ini dirancang untuk memuat informasi penting seperti visi dan misi yayasan, jenjang pendidikan yang tersedia (Raudhatul Athfal), status akreditasi, alamat lengkap, kontak yang dapat dihubungi, serta informasi pendaftaran peserta didik baru.

Melalui website ini, diharapkan RA Ar-Rayhan dapat meningkatkan visibilitasnya secara digital serta memberikan kemudahan bagi masyarakat dalam mengakses informasi seputar pendidikan dan kegiatan yang diselenggarakan oleh yayasan.',
    'created_at' => '2025-05-14 07:57:30',
    'updated_at' => '2025-05-16 08:21:23',
  ),
  1 => 
  array (
    'berita_id' => '2',
    'gambar_id' => '7',
    'judul' => 'Penerimaan Peserta Didik Baru RA Ar-Rayhan Telah Dibuka',
    'slug' => 'penerimaan-peserta-didik-baru-ra-ar-rayhan-telah-dibuka',
    'isi' => '🎉 Penerimaan Peserta Didik Baru (PPDB) RA Ar-Rayhan Medan Denai Tahun Ajaran 2025 Telah Dibuka! 🎉

Dengan penuh semangat dan dedikasi dalam mendidik generasi muda yang cerdas, mandiri, dan berakhlakul karimah, RA Ar-Rayhan Medan Denai mengumumkan bahwa Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2025 telah resmi dibuka mulai 1 Desember 2024 hingga 31 Januari 2025 untuk Gelombang 1.

📍 RA Ar-Rayhan merupakan madrasah unggulan yang telah terakreditasi A, dan terus berkembang dalam memberikan layanan pendidikan anak usia dini berbasis Islam dengan metode belajar sambil bermain. Kami menggunakan Kurikulum Merdeka yang disesuaikan untuk anak usia Golden Age, dengan kegiatan yang mendukung perkembangan minat, bakat, dan karakter anak.

📞 Untuk informasi dan pendaftaran, silakan hubungi:
0852-9762-9760

📌 Jangan lewatkan kesempatan emas ini untuk menjadi bagian dari keluarga besar RA Ar-Rayhan Medan Denai! Mari wujudkan generasi masa depan yang beriman, cerdas, dan mandiri bersama kami.',
    'created_at' => '2025-05-16 08:26:38',
    'updated_at' => '2025-05-16 08:36:04',
  ),
);

        // Handle datetime fields
        $this->db->table('berita')->insertBatch($data);
    }
}
