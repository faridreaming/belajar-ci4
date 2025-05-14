<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<?php helper(['text', 'time']); ?>
<!-- Hero Section -->
<div class="bg-white d-flex align-items-center py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
                <img src="<?= base_url('assets/img/akreditasi-a.png'); ?>" alt="Logo" class="mb-4 hero-logo">
                <h1 class="fw-bold mb-3">RAUDHATUL ATHFAL<br>
                    AR-RAYHAN</h1>
                <p class="lead mb-4">
                    TERAKREDITASI A
                </p>
                <a href="<?= base_url('tentang'); ?>" class="btn btn-success btn-lg rounded-pill px-4">
                    Selengkapnya<i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('assets/img/hero.png'); ?>" alt="Hero Image" class="img-fluid rounded border shadow-sm">
            </div>
        </div>
    </div>
</div>

<!-- Sambutan Kepala Sekolah -->
<div class="container px-3 py-5">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 mb-3 mb-md-0 text-center text-md-start">
            <img src="<?= base_url('assets/img/kepala-sekolah.png'); ?>" alt="Foto Kepala Sekolah" class="img-fluid foto-kepala-sekolah">
        </div>
        <div class="col-lg-9 col-md-8 text-center text-md-start">
            <h2 class="fw-bold">SAMBUTAN KEPALA SEKOLAH</h2>
            <p class="text-muted">Assalamu'alaikum Warahmatullahi Wabarakatuh.</p>
            <p>Kami, Raudhatul Athfal (RA) Ar-Rayhan, yang berdiri pada tahun 2011, merupakan madrasah binaan Kementerian Agama yang telah banyak mencetak generasi-generasi yang cerdas, mandiri, dan terampil. Alhamdulillah, RA Ar-Rayhan terus berkembang dari tahun ke tahun. Sebagai madrasah unggul yang telah terakreditasi A, kami senantiasa memberikan pelayanan pendidikan yang prima dan terbaik bagi masyarakat. Dari segi prestasi, RA Ar-Rayhan telah banyak menorehkan kemenangan dalam berbagai perlombaan tingkat kecamatan, kabupaten/kota, hingga nasional. Semua prestasi tersebut diraih melalui kerja keras dan usaha yang maksimal. Semoga ke depannya, RA Ar-Rayhan tetap eksis dan konsisten dalam memberikan pelayanan pendidikan kepada anak-anak hebat Indonesia, khususnya anak-anak usia Golden Age. Wassalamu'alaikum warahmatullahi wabarakatuh.</p>
        </div>
    </div>
</div>

<!-- Seputar RA Ar-Rayhan -->
<div class="bg-white">
    <div class="container px-3 py-5 overflow-x-hidden">
        <h2 class="fw-bold text-center mb-4">SEPUTAR RA AR-RAYHAN</h2>
        <h4 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">BERITA TERBARU</h4>
        <div class="row g-5">
            <div class="col-lg-7">
                <!-- Berita Terbaru -->
                <div class="bg-white h-100">
                    <?php if (!empty($berita) && isset($berita[0])): $b = $berita[0]; ?>
                        <div class="mb-2">
                            <img src="<?= $b->gambar_id ? base_url('assets/img/upload/' . $b->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>" alt="<?= esc($b->judul); ?>" class="img-fluid w-100 object-fit-cover berita-utama-img">
                        </div>
                        <h5 class="fw-bold text-success"><?= esc($b->judul); ?></h5>
                        <div class="mb-2 small text-muted">
                            <i class="bi bi-clock me-2"></i><?= format_time_ago($b->updated_at); ?>
                        </div>
                        <div class="mb-3 text-secondary">
                            <?= esc(substr(strip_tags($b->isi), 0, 200)) . '...'; ?>
                        </div>
                        <a href="<?= base_url('berita/' . $b->slug); ?>" class="btn btn-outline-success btn-sm rounded-pill px-4 fw-semibold">Baca Selengkapnya</a>
                    <?php else: ?>
                        <div class="text-muted fst-italic">Belum ada berita.</div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Berita Lainnya -->
            <div class="col-lg-5">
                <div class="row g-3">
                    <?php for ($i = 1; $i < 5; $i++): if (!isset($berita[$i])) break; $b = $berita[$i]; ?>
                        <div class="col-6">
                            <div class="bg-white h-100">
                                <img src="<?= $b->gambar_id ? base_url('assets/img/upload/' . $b->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>" alt="<?= esc($b->judul); ?>" class="img-fluid mb-2 berita-lain-img">
                                <div class="fw-semibold mb-0">
                                    <a href="<?= base_url('berita/' . $b->slug); ?>" class="text-success text-decoration-none hover-underline"><?= esc($b->judul); ?></a>
                                </div>
                                <div class="small text-muted">
                                    <i class="bi bi-calendar-event me-2"></i><?= date_format(date_create($b->updated_at), 'd F Y'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <a href="<?= base_url('berita'); ?>" class="btn btn-success rounded-pill px-4 fw-semibold">Berita lainnya<i class="bi bi-box-arrow-up-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 