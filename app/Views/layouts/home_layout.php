
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | RA Ar-Rayhan</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/home-style.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100 no-transition">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-1 z-3">
        <div class="container">
            <div class="d-flex justify-content-between gap-2 gap-sm-3 align-items-center">
                <a class="navbar-brand text-success d-flex gap-2 fs-6 align-items-center m-0" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="d-inline-block align-text-top">
                    <div>
                        <small class="small d-none d-sm-block" style="font-size: 16px;">RAUDHATUL ATHFAL</small>
                        <small class="small d-blcok d-sm-none" style="font-size: 12px;">RAUDHATUL ATHFAL</small>
                        <div class="d-none d-sm-block">AR-RAYHAN</div>
                        <small class="small d-block d-sm-none">AR-RAYHAN</small>
                    </div>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('tentang'); ?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('prestasi'); ?>">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berita'); ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('galeri'); ?>">Galeri</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Cari..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="bg-white">
        <div class="container text-center hero py-5">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-3">
            <h5 class="card-title fw-bold">Selamat datang di website RA Ar-Rayhan</h5>
            <p class="card-text">Temukan informasi terbaru seputar kegiatan dan perkembangan yayasan kami.</p>
            <div class="mt-4">
                <a href="<?= base_url('berita'); ?>" class="btn btn-success">Lihat Berita Terbaru</a>
            </div>
        </div>
    </main>

    <!-- footer -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>