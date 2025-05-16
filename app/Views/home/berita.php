<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-5 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">BERITA RA AR-RAYHAN</h1>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <?php if (empty($berita)): ?>
            <div class="text-center">
                <div class="text-muted fst-italic">Belum ada berita.</div>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($berita as $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border">
                            <img src="<?= $item->gambar_id && isset($item->nama_file_gambar) ? base_url('assets/img/upload/' . $item->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>" class="card-img-top" alt="<?= $item->judul_gambar ?>">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <a href="<?= base_url('berita/' . $item->slug); ?>" class="text-success text-decoration-none hover-underline"><?= esc($item->judul); ?></a>
                                </h5>
                                <p class="text-muted small"><i class="bi bi-calendar-event me-2"></i><?= date_format(date_create($item->updated_at), 'd F Y'); ?></p>
                                <p class="card-text text-secondary"><?= substr($item->isi, 0, 150) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                    <?= $pager->links('berita', 'default') ?>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>