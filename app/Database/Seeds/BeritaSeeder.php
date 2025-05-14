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
    'updated_at' => '2025-05-14 07:57:30',
  ),
);

        // Handle datetime fields
        $this->db->table('berita')->insertBatch($data);
    }
}
