<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | RA Ar-Rayhan</title>
    <link rel="icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin-style.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100 no-transition">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-1 z-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between gap-2 gap-sm-3 align-items-center">
                <button class="btn btn-sm btn-white btn-light border-0 fs-5 p-2" id="sidebar-toggle">
                    <i class="bi bi-list d-flex"></i>
                </button>
                <a class="navbar-brand text-success d-flex gap-2 fs-6 align-items-center m-0" href="<?= base_url('admin'); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="d-inline-block align-text-top">
                    <div>
                        <small class="small d-none d-sm-block" style="font-size: 16px;">RAUDHATUL ATHFAL</small>
                        <small class="small d-blcok d-sm-none" style="font-size: 12px;">RAUDHATUL ATHFAL</small>
                        <div class="d-none d-sm-block">AR-RAYHAN</div>
                        <small class="small d-block d-sm-none">AR-RAYHAN</small>
                    </div>
                </a>
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-white btn-light border-0 dropdown-toggle rounded-pill p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="<?= base_url('assets/img/no-image.png'); ?>" alt="<?= $admin ? $admin->username : 'Admin'; ?> photo">
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <div class="dropdown-header d-flex gap-2">
                            <img class="rounded-circle" src="<?= base_url('assets/img/no-image.png'); ?>" alt="<?= $admin ? $admin->username : 'Admin'; ?> photo">
                            <div>
                                <div class="fw-semibold text-black"><?= $admin ? $admin->username : 'Admin'; ?></div>
                                <div><?= $admin ? $admin->email : ''; ?></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger d-flex gap-2" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right d-flex align-items-center"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="d-flex flex-grow-1 position-relative">
        <!-- main sidebar -->
        <div class="sidebar p-3 border-end bg-white h-100 position-absolute top-0 start-0 bottom-0 z-2" id="sidebar">
            <?php
            $uri = uri_string();

            $is_admin = str_starts_with($uri, 'admin');
            $is_berita = str_starts_with($uri, 'admin/berita');
            $is_prestasi = str_starts_with($uri, 'admin/prestasi');
            $is_gambar = str_starts_with($uri, 'admin/gambar');
            ?>

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link <?= $is_admin && !$is_berita && !$is_prestasi && !$is_gambar ? 'bg-success text-white' : 'link-dark'; ?> rounded">
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/berita'); ?>" class="mt-1 nav-link <?= $is_berita ? 'bg-success text-white' : 'link-dark'; ?> rounded">
                        <i class="bi bi-newspaper me-2"></i> Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/prestasi'); ?>" class="mt-1 nav-link <?= $is_prestasi ? 'bg-success text-white' : 'link-dark'; ?> rounded">
                        <i class="bi bi-trophy me-2"></i> Prestasi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/gambar'); ?>" class="mt-1 nav-link <?= $is_gambar ? 'bg-success text-white' : 'link-dark'; ?> rounded">
                        <i class="bi bi-images me-2"></i> Gambar
                    </a>
                </li>
                <li class="nav-item">
                    <hr>
                    <a href="<?= base_url('/'); ?>" target="_blank" class="nav-link link-success rounded">
                        <i class="bi bi-box-arrow-up-right me-2"></i> Lihat Website
                    </a>
                </li>
            </ul>

        </div>

        <!-- main content -->
        <div class="main-content p-3 w-100 position-absolute h-100 overflow-auto">
            <?= $this->renderSection('content'); ?>
            <footer class="text-center text-muted mt-3">
                Copyright &copy; RA Ar-Rayhan <?= date('Y'); ?>
            </footer>
        </div>
    </main>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar dari sistem?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-success rounded-pill">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        // Initialize form-related functionality
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize character counters if elements exist
            ['judul', 'isi', 'prestasi', 'tingkat', 'jenis', 'deskripsi'].forEach(id => {
                const element = document.getElementById(id);
                const countElement = document.getElementById(id + 'Count');
                if (element && countElement) {
                    const maxLength = element.getAttribute('maxlength') || (id === 'isi' || id === 'deskripsi' ? 5000 : 128);
                    updateCharCount(id, id + 'Count', maxLength);
                }
            });

            // Initialize image preview if elements exist
            if (document.getElementById('preview')) {
                previewGambar();
                previewFileGambar();
            }
        });

        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const main = document.querySelector('main');

        window.onload = () => {
            // Remove no-transition class after slight delay
            setTimeout(() => {
                document.body.classList.remove("no-transition");
            }, 10);

            // Restore sidebar state from localStorage
            const sidebarActive = localStorage.getItem('sidebarActive') === 'true';
            sidebar.classList.toggle('active', sidebarActive);
            main.classList.toggle('sidebar-active', sidebarActive);
        };

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            main.classList.toggle('sidebar-active');
            localStorage.setItem('sidebarActive', sidebar.classList.contains('active'));
        });

        // Image preview functionality
        function previewGambar() {
            const select = document.getElementById('gambar_id');
            const selectedOption = select.options[select.selectedIndex];
            const fileName = selectedOption.getAttribute('data-nama-file');
            const img = document.getElementById('preview');
            const basePath = "<?= base_url('assets/img/upload') ?>";

            img.src = basePath + "/" + (fileName ?? "default.jpg");
        }

        function previewFileGambar(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const reader = new FileReader();

            reader.onload = () => {
                preview.src = reader.result;
            };

            if (input.files?.[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Character count functionality
        function updateCharCount(inputId, countId, maxLength) {
            const input = document.getElementById(inputId);
            const countDisplay = document.getElementById(countId);
            const currentLength = input.value.length;

            countDisplay.textContent = `${currentLength} / ${maxLength} karakter`;
            countDisplay.classList.toggle('text-danger', currentLength >= maxLength);
            countDisplay.classList.toggle('text-muted', currentLength < maxLength);
        }

        // Alert auto-dismiss
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 6000);

        // Delete confirmation handling
        let formToDelete = null;

        document.querySelectorAll('.btn-trigger-hapus').forEach(button => {
            button.addEventListener('click', function() {
                formToDelete = this.closest('form');
            });
        });

        document.getElementById('btnConfirmDelete')?.addEventListener('click', () => {
            formToDelete?.submit();
        });
    </script>
</body>

</html>