<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RA Ar-Rayhan adalah lembaga pendidikan anak usia dini di Medan yang berfokus pada pembentukan karakter Islami dan pembelajaran kreatif.">
    <meta name="keywords" content="RA Ar-Rayhan, TK Islam Medan, Pendidikan Anak, Sekolah Islam, RA Medan">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://arrayhanmedan.com/">
    <meta property="og:title" content="RA Ar-Rayhan">
    <meta property="og:description" content="Pendidikan karakter Islami dan kreatif untuk anak usia dini di Medan.">
    <meta property="og:image" content="https://arrayhanmedan.com/assets/images/logo.png">
    <meta property="og:url" content="https://arrayhanmedan.com/">
    <meta property="og:type" content="website">
    <title><?= $title; ?> | RA Ar-Rayhan</title>
    <link rel="icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/home-style.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100 no-transition">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top py-1 z-3">
        <div class="container">
            <div class="d-flex justify-content-between gap-2 gap-sm-3 align-items-center">
                <a class="navbar-brand text-success d-flex gap-2 fs-6 align-items-center m-0" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                    <div>
                        <small class="small d-none d-sm-block" style="font-size: 16px;">RAUDHATUL ATHFAL</small>
                        <small class="small d-blcok d-sm-none" style="font-size: 12px;">RAUDHATUL ATHFAL</small>
                        <div class="d-none d-sm-block fw-bold">AR-RAYHAN</div>
                        <small class="small d-block d-sm-none fw-bold">AR-RAYHAN</small>
                    </div>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                $uri = uri_string();

                $is_home = $uri === '';
                $is_profil = str_starts_with($uri, 'profil');
                $is_prestasi = str_starts_with($uri, 'prestasi');
                $is_berita = str_starts_with($uri, 'berita');
                $is_galeri = str_starts_with($uri, 'galeri');
                ?>
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link <?= $is_home ? 'active' : ''; ?>" href="<?= base_url(); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $is_profil ? 'active' : ''; ?>" href="<?= base_url('profil'); ?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $is_prestasi ? 'active' : ''; ?>" href="<?= base_url('prestasi'); ?>">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $is_berita ? 'active' : ''; ?>" href="<?= base_url('berita'); ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $is_galeri ? 'active' : ''; ?>" href="<?= base_url('galeri'); ?>">Galeri</a>
                    </li>
                </ul>
                                <form class="d-flex" role="search" action="<?= base_url('search') ?>" method="get">                    <div class="input-group border rounded">                        <input class="form-control bg-light border-0" type="search" name="q" placeholder="Cari..." aria-label="Search" value="<?= isset($keyword) ? esc($keyword) : '' ?>">                        <button class="btn btn-light" type="submit">                            <i class="bi bi-search"></i>                        </button>                    </div>                </form>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-success text-white">
        <div class="container py-5">
            <div class="row g-4">
                <!-- School Identity Section -->
                <div class="col-md-4 text-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo RA AR-RAYHAN" class="img-fluid mb-3 footer-logo">
                        <h5 class="fw-bold mb-2">RAUDHATUL ATHFAL<br>
                            AR-RAYHAN</h5>
                        <div class="mb-3">
                            <span class="d-block">Akreditasi A</span>
                            <span class="d-block">NPSN: 69730224</span>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <a title="Facebook" href="https://www.facebook.com/groups/1425422257763597/permalink/3182498255389313/?sfnsn=wiwspwawes" target="_blank" class="text-white text-decoration-none rounded-circle border border-2 p-2 d-inline-flex align-items-center justify-content-center social-icon">
                                <i class="d-flex bi bi-facebook fs-5"></i>
                            </a>
                            <a title="Instagram" href="https://www.instagram.com/raarrayhanmedan" target="_blank" class="text-white text-decoration-none rounded-circle border border-2 p-2 d-inline-flex align-items-center justify-content-center social-icon">
                                <i class="d-flex bi bi-instagram fs-5"></i>
                            </a>
                            <a title="Youtube" href="https://www.youtube.com/@raarrayhanmedan8966" target="_blank" class="text-white text-decoration-none rounded-circle border border-2 p-2 d-inline-flex align-items-center justify-content-center social-icon">
                                <i class="d-flex bi bi-youtube fs-5"></i>
                            </a>
                            <a title="Tiktok" href="https://www.tiktok.com/@raarrayhanmedan" target="_blank" class="text-white text-decoration-none rounded-circle border border-2 p-2 d-inline-flex align-items-center justify-content-center social-icon">
                                <i class="d-flex bi bi-tiktok fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-4 text-center text-md-start">HUBUNGI KAMI</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="contact-item">
                            <h6 class="fw-semibold d-flex align-items-center">
                                <i class="bi bi-geo-alt-fill me-2"></i>Alamat:
                            </h6>
                            <p class="ms-4 mb-0">Jln. Denai Gang Aneka No. 4b</p>
                        </div>
                        <div class="contact-item">
                            <h6 class="fw-semibold d-flex align-items-center">
                                <i class="bi bi-envelope-fill me-2"></i>Email:
                            </h6>
                            <p class="ms-4 mb-0">raarrayhanmedan@gmail.com</p>
                        </div>
                        <div class="contact-item">
                            <h6 class="fw-semibold d-flex align-items-center">
                                <i class="bi bi-telephone-fill me-2"></i>Telepon:
                            </h6>
                            <p class="ms-4 mb-0">0852-9762-9760</p>
                        </div>
                        <div class="contact-item">
                            <h6 class="fw-semibold d-flex align-items-center">
                                <i class="bi bi-clock-fill me-2"></i>Jam Kerja:
                            </h6>
                            <p class="ms-4 mb-0">Senin - Sabtu: 08.00 - 18.00</p>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="col-md-4">
                    <div class="h-100 rounded overflow-hidden shadow-sm">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d703.9295270928197!2d98.71547351059282!3d3.581332478562434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031311d36f470e7%3A0x5fe1aa979bea2c41!2sGg.%20Aneka%20Buntu%20Jl.%20Denai%20No.4B%2C%20Tegal%20Sari%20Mandala%20III%2C%20Kec.%20Medan%20Denai%2C%20Kota%20Medan%2C%20Sumatera%20Utara%2020227!5e0!3m2!1sid!2sid!4v1747379059874!5m2!1sid!2sid" 
                            class="w-100 h-100" 
                            style="border:0; min-height:300px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-4 border-top border-white border-1">
            Copyright &copy; RA Ar-Rayhan <?= date('Y'); ?>
        </div>
    </footer>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    
    <!-- Gallery Modal Navigation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        if (imageModal) {
            const carousel = new bootstrap.Carousel(document.getElementById('imageCarousel'), {
                interval: false,
                keyboard: true
            });

            // Handle modal show event
            imageModal.addEventListener('show.bs.modal', function(event) {
                const link = event.relatedTarget;
                const slideIndex = link.getAttribute('data-bs-slide-to');
                carousel.to(parseInt(slideIndex));
            });

            // Handle keyboard navigation
            imageModal.addEventListener('keydown', function(event) {
                if (event.key === 'ArrowLeft') {
                    carousel.prev();
                } else if (event.key === 'ArrowRight') {
                    carousel.next();
                } else if (event.key === 'Escape') {
                    bootstrap.Modal.getInstance(imageModal).hide();
                }
            });

            // Prevent scrolling when modal is open
            imageModal.addEventListener('shown.bs.modal', function() {
                document.body.style.overflow = 'hidden';
            });

            imageModal.addEventListener('hidden.bs.modal', function() {
                document.body.style.overflow = '';
            });
        }
    });
    </script>
</body>

</html> 