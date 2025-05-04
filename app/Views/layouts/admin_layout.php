<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin-style.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100 no-transition">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-1">
        <div class="container-fluid">
            <div class="d-flex justify-content-between gap-3 align-items-center">
                <button class="btn btn-sm btn-white btn-light border-0 fs-5 p-2" id="sidebar-toggle">
                    <i class="bi bi-list d-flex"></i>
                </button>
                <a class="navbar-brand text-primary d-flex gap-2 fs-6 align-items-center" href="<?= base_url('admin'); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="d-inline-block align-text-top">
                    <div>
                        <div style="font-size: 16px;">RAUDHATUL ATHFAL</div>
                        <div>AR-RAYHAN</div>
                    </div>
                </a>
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-white btn-light border-0 dropdown-toggle rounded-pill p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="<?= base_url('assets/img/no-image.png'); ?>" alt="<?= $admin->username; ?> photo">
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <div class="dropdown-header d-flex gap-2">
                            <img class="rounded-circle" src="<?= base_url('assets/img/no-image.png'); ?>" alt="<?= $admin->username; ?> photo">
                            <div>
                                <div class="fw-semibold text-black"><?= $admin->username; ?></div>
                                <div><?= $admin->email; ?></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger d-flex gap-2" href="#"><i class="bi bi-box-arrow-right d-flex align-items-center"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="d-flex flex-grow-1 position-relative">
        <!-- main sidebar -->
        <div class="sidebar p-3 border-end bg-white h-100 position-absolute top-0 start-0" id="sidebar">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link <?= uri_string() === 'admin' || uri_string() === 'admin/' ? 'bg-primary text-white rounded' : 'link-dark'; ?>">
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </a>
                    <a href="<?= base_url('admin/berita'); ?>" class="nav-link  <?= uri_string() === 'admin/berita' || uri_string() === 'admin/berita/' ? 'bg-primary text-white rounded' : 'link-dark'; ?>">
                        <i class="bi bi-newspaper me-2"></i> Berita
                    </a>
                    <a href="<?= base_url('admin/gambar'); ?>" class="nav-link  <?= uri_string() === 'admin/gambar' || uri_string() === 'admin/gambar/' ? 'bg-primary text-white rounded' : 'link-dark'; ?>">
                        <i class="bi bi-images me-2"></i> Gambar
                    </a>
                    <hr>
                    <a href="<?= base_url('/'); ?>" target="_blank" class="nav-link">
                        <i class="bi bi-box-arrow-up-right me-2"></i> Lihat Website
                    </a>
                </li>
            </ul>
        </div>

        <!-- main content -->
        <div class="main-content p-3 w-100 overflow-auto">
            <?= $this->renderSection('content'); ?>
            <footer class="text-center text-muted mt-3">
                Copyright &copy; RA Ar-Rayhan <?= date('Y'); ?>
            </footer>
        </div>
    </main>

    <!-- footer -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const main = document.querySelector('main');

        window.onload = () => {
            setTimeout(() => {
                document.body.classList.remove("no-transition");
            }, 10);

            const sidebarActive = localStorage.getItem('sidebarActive') === 'true';
            if (sidebarActive) {
                sidebar.classList.add('active');
                main.classList.add('sidebar-active');
            } else {
                sidebar.classList.remove('active');
                main.classList.remove('sidebar-active');
            }
        }

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            main.classList.toggle('sidebar-active');

            localStorage.setItem('sidebarActive', sidebar.classList.contains('active'));
        });
    </script>
</body>

</html>