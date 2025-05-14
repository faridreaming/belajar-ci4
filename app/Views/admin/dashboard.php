<?= $this->extend('layouts/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="card mb-3 dashboard-message">
    <div class="card-body text-center">
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-3">
        <h5 class="card-title fw-bold">Selamat datang di halaman admin RA Ar-Rayhan</h5>
        <p class="card-text">Silakan pilih menu di sidebar untuk mengelola data.</p>
    </div>
</div>

<div class="row g-3">
    <?php foreach ($tabel as $nama => $item): ?>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="d-flex bg-success p-3 text-white rounded fs-3 icon-wrapper">
                        <i class="bi <?= $item['icon']; ?> d-flex"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-muted small fw-semibold"><?= $nama; ?></h5>
                        <h6 class="card-subtitle fw-bold fs-3"><?= $item['jumlahData']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>
