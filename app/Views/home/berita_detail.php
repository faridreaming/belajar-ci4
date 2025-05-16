<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-5 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">BERITA RA AR-RAYHAN</h1>
        </div>
    </div>
</div>

<div>
    <div class="container py-5">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="bg-white p-4 rounded border h-100">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-success text-decoration-none">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('berita') ?>" class="text-success text-decoration-none">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= esc($berita->judul) ?></li>
                        </ol>
                    </nav>
                    <h2 class="fw-bold text-success mb-3"><?= esc($berita->judul) ?></h2>
                    <p class="text-muted mb-4">
                        <i class="bi bi-calendar-event me-2"></i><?= date('d F Y', strtotime($berita->created_at)) ?>
                    </p>

                    <div class="mb-4">
                        <img src="<?= $berita->gambar_id && isset($berita->nama_file_gambar) ? base_url('assets/img/upload/' . $berita->nama_file_gambar) : base_url('assets/img/upload/default.jpg') ?>" 
                             alt="<?= esc($berita->judul) ?>" 
                             class="img-fluid rounded berita-utama-img object-fit-contain">
                    </div>

                    <div class="blog-post-content lh-lg">
                        <?= nl2br($berita->isi) ?>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded border">
                    <h4 class="fw-bold text-success mb-4 berita-sidebar-title border-start border-success border-3">BERITA TERBARU</h4>
                    <?php if (empty($recent_berita)): ?>
                        <div class="text-muted fst-italic">Belum ada berita terbaru lainnya.</div>
                    <?php else: ?>
                        <?php foreach ($recent_berita as $recent): ?>
                        <div class="mt-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <a href="<?= base_url('berita/' . $recent->slug) ?>">
                                        <img src="<?= $recent->gambar_id && isset($recent->nama_file_gambar) ? base_url('assets/img/upload/' . $recent->nama_file_gambar) : base_url('assets/img/upload/default.jpg') ?>" 
                                             alt="<?= esc($recent->judul) ?>" 
                                             class="img-fluid rounded berita-sidebar-thumb">
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="<?= base_url('berita/' . $recent->slug) ?>" class="text-decoration-none">
                                        <h6 class="fw-semibold text-success mb-1"><?= esc($recent->judul) ?></h6>
                                    </a>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar-event me-2"></i><?= date('d F Y', strtotime($recent->created_at)) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 