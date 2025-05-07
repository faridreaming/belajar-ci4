<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | RA Ar-Rayhan</title>
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
        <div class="sidebar p-3 border-end bg-white h-100 position-absolute top-0 start-0 bottom-0 z-2" id="sidebar">
            <?php
            $uri = uri_string();

            $is_admin = str_starts_with($uri, 'admin');
            $is_berita = str_starts_with($uri, 'admin/berita');
            $is_gambar = str_starts_with($uri, 'admin/gambar');
            ?>

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link <?= $is_admin && !$is_berita && !$is_gambar ? 'bg-success text-white disabled' : 'link-dark'; ?> rounded">
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/berita'); ?>" class="mt-1 nav-link <?= $is_berita ? 'bg-success text-white disabled' : 'link-dark'; ?> rounded">
                        <i class="bi bi-newspaper me-2"></i> Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/gambar'); ?>" class="mt-1 nav-link <?= $is_gambar ? 'bg-success text-white disabled' : 'link-dark'; ?> rounded">
                        <i class="bi bi-images me-2"></i> Gambar
                    </a>
                </li>
                <li class="nav-item">
                    <hr>
                    <a href="<?= base_url('/'); ?>" target="_blank" class="nav-link link-success">
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

    <!-- footer -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            updateCharCount('judul', 'judulCount', 128)
            updateCharCount('isi', 'isiCount', 5000)
            previewGambar()
            previewFileGambar()
        })

        const sidebarToggle = document.getElementById('sidebar-toggle')
        const sidebar = document.getElementById('sidebar')
        const main = document.querySelector('main')

        window.onload = () => {
            setTimeout(() => {
                document.body.classList.remove("no-transition")
            }, 10)

            const sidebarActive = localStorage.getItem('sidebarActive') === 'true'
            if (sidebarActive) {
                sidebar.classList.add('active')
                main.classList.add('sidebar-active')
            } else {
                sidebar.classList.remove('active')
                main.classList.remove('sidebar-active')
            }
        }

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active')
            main.classList.toggle('sidebar-active')

            localStorage.setItem('sidebarActive', sidebar.classList.contains('active'))
        })

        function previewGambar() {
            const select = document.getElementById('gambar_id')
            const selectedOption = select.options[select.selectedIndex]
            const fileName = selectedOption.getAttribute('data-nama-file')
            const img = document.getElementById('preview')

            const basePath = "<?= base_url('assets/img/upload') ?>"
            img.src = basePath + "/" + (fileName ?? "default.jpg")
        }

        function previewFileGambar(event) {
            const input = event.target
            const preview = document.getElementById('preview')
            const reader = new FileReader()

            reader.onload = function() {
                preview.src = reader.result
            }

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0])
            }
        }

        function updateCharCount(inputId, countId, maxLength) {
            const input = document.getElementById(inputId)
            const countDisplay = document.getElementById(countId)
            const currentLength = input.value.length

            countDisplay.textContent = `${input.value.length} / ${maxLength} karakter`
            if (currentLength >= maxLength) {
                countDisplay.classList.remove('text-muted')
                countDisplay.classList.add('text-danger')
            } else {
                countDisplay.classList.add('text-muted')
                countDisplay.classList.remove('text-danger')
            }
        }

        setTimeout(function() {
            const alert = document.getElementById('successAlert')
            if (alert) {
                alert.classList.remove('show')
                alert.classList.add('fade')
                setTimeout(() => alert.remove(), 500)
            }
        }, 6000)

        let formToDelete = null

        document.querySelectorAll('.btn-trigger-hapus').forEach(button => {
            button.addEventListener('click', function() {
                formToDelete = this.closest('form')
            })
        })

        document.getElementById('btnConfirmDelete').addEventListener('click', function() {
            if (formToDelete) {
                formToDelete.submit()
            }
        });
    </script>
</body>

</html>