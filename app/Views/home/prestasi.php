<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-5 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">PRESTASI RA AR-RAYHAN</h1>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <!-- Prestasi Siswa -->
        <div class="mb-5">
            <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">PRESTASI SISWA</h2>
            <div class="row g-4">
                <?php foreach ($prestasiByJenis['Prestasi Siswa'] as $prestasi): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border">
                            <img src="<?= base_url('assets/img/upload/' . $prestasi->nama_file_gambar); ?>" class="card-img-top" alt="<?= $prestasi->judul_gambar ?>">
                            <div class="card-body">
                                <div class="badge bg-success mb-2"><?= $prestasi->tingkat ?></div>
                                <h5 class="card-title fw-bold"><?= $prestasi->prestasi ?></h5>
                                <p class="card-text text-secondary"><?= $prestasi->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Prestasi Pengajar -->
        <div class="mb-5">
            <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">PRESTASI PENGAJAR</h2>
            <div class="row g-4">
                <?php foreach ($prestasiByJenis['Prestasi Pengajar'] as $prestasi): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border">
                            <img src="<?= base_url('assets/img/upload/' . $prestasi->nama_file_gambar); ?>" class="card-img-top" alt="<?= $prestasi->judul_gambar ?>">
                            <div class="card-body">
                                <div class="badge bg-success mb-2"><?= $prestasi->tingkat ?></div>
                                <h5 class="card-title fw-bold"><?= $prestasi->prestasi ?></h5>
                                <p class="card-text text-secondary"><?= $prestasi->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Prestasi Lembaga -->
        <div>
            <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">PRESTASI LEMBAGA</h2>
            <div class="row g-4">
                <?php foreach ($prestasiByJenis['Prestasi Lembaga'] as $prestasi): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border">
                            <img src="<?= base_url('assets/img/upload/' . $prestasi->nama_file_gambar); ?>" class="card-img-top" alt="<?= $prestasi->judul_gambar ?>">
                            <div class="card-body">
                                <div class="badge bg-success mb-2"><?= $prestasi->tingkat ?></div>
                                <h5 class="card-title fw-bold"><?= $prestasi->prestasi ?></h5>
                                <p class="card-text text-secondary"><?= $prestasi->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>