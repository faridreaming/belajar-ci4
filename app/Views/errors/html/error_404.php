<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= lang('Errors.pageNotFound') ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
    <link href="<?= base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card rounded-4">
                    <div class="card-body text-center p-5">
                        <h1 class="display-1 fw-bold text-secondary mb-4">404</h1>
                        <p class="fs-5 text-secondary mb-4">
                            <?php if (ENVIRONMENT !== 'production') : ?>
                                <?= nl2br(esc($message)) ?>
                            <?php else : ?>
                                Halaman yang Anda cari tidak dapat ditemukan
                            <?php endif; ?>
                        </p>
                        <div class="d-flex gap-2 justify-content-center">
                            <button onclick="history.back()" class="btn btn-light border px-4">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </button>
                            <a href="<?= base_url() ?>" class="btn btn-success px-4">
                                <i class="bi bi-house-door me-2"></i>Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
