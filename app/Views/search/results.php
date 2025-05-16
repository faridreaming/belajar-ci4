<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-5 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">HASIL PENCARIAN</h1>
            <?php if (!empty($keyword)): ?>
                <p class="text-white">Menampilkan hasil pencarian untuk: <strong>"<?= esc($keyword) ?>"</strong></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <?php if (empty($keyword)): ?>
            <div class="text-center">
                <div class="alert alert-warning">
                    Silakan masukkan kata kunci pencarian.
                </div>
            </div>
        <?php elseif (empty($results['berita']) && empty($results['prestasi']) && empty($results['gambar'])): ?>
            <div class="text-center">
                <div class="alert alert-info">
                    Tidak ada hasil yang ditemukan untuk pencarian Anda.
                </div>
            </div>
        <?php else: ?>
            <!-- Berita Results -->
            <?php if (!empty($results['berita'])): ?>
                <div class="mb-5">
                    <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">BERITA</h2>
                    <div class="row g-4">
                        <?php foreach ($results['berita'] as $berita): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border">
                                    <img src="<?= $berita->gambar_id && isset($berita->nama_file_gambar) ? base_url('assets/img/upload/' . $berita->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>" 
                                         class="card-img-top" 
                                         alt="<?= $berita->judul ?>">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">
                                            <a href="<?= base_url('berita/' . $berita->slug); ?>" class="text-success text-decoration-none hover-underline"><?= esc($berita->judul); ?></a>
                                        </h5>
                                        <p class="text-muted small"><i class="bi bi-calendar-event me-2"></i><?= date_format(date_create($berita->updated_at), 'd F Y'); ?></p>
                                        <p class="card-text text-secondary"><?= substr($berita->isi, 0, 150) ?>...</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Prestasi Results -->
            <?php if (!empty($results['prestasi'])): ?>
                <div class="mb-5">
                    <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">PRESTASI</h2>
                    <div class="row g-4">
                        <?php foreach ($results['prestasi'] as $prestasi): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border">
                                    <img src="<?= $prestasi->gambar_id && $prestasi->nama_file_gambar ? base_url('assets/img/upload/' . $prestasi->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>" 
                                         class="card-img-top" 
                                         alt="<?= $prestasi->prestasi ?>">
                                    <div class="card-body">
                                        <div class="badge bg-success mb-2"><?= $prestasi->tingkat ?></div>
                                        <h5 class="card-title fw-bold"><?= esc($prestasi->prestasi) ?></h5>
                                        <p class="card-text text-secondary"><?= $prestasi->deskripsi ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Galeri Results -->
            <?php if (!empty($results['gambar'])): ?>
                <div>
                    <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">GALERI</h2>
                    <div class="row g-4">
                        <?php foreach ($results['gambar'] as $image): ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="rounded h-100">
                                    <a href="#" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal" 
                                        data-bs-slide-to="<?= array_search($image, $results['gambar']) ?>"
                                        class="text-decoration-none image-link">
                                        <img src="<?= base_url('assets/img/upload/' . $image->nama_file) ?>"
                                            class="w-100 rounded"
                                            alt="<?= $image->judul ?>"
                                            style="object-fit: cover; height: 200px;">
                                    </a>
                                    <h5 class="mt-2 small text-muted text-center"><?= esc($image->judul) ?></h5>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Image Modal with Carousel -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen m-0">
                            <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.5);">
                                <button type="button" class="btn-close btn-close-white position-absolute end-0 top-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                
                                <div class="modal-body d-flex align-items-center justify-content-center p-0">
                                    <div id="imageCarousel" class="carousel slide w-100">
                                        <div class="carousel-inner">
                                            <?php foreach ($results['gambar'] as $index => $image): ?>
                                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
                                                        <img src="<?= base_url('assets/img/upload/' . $image->nama_file) ?>"
                                                            class="img-fluid"
                                                            alt="<?= $image->judul ?>"
                                                            style="max-height: 90vh; object-fit: contain;">
                                                        <h5 class="text-white mt-3"><?= esc($image->judul) ?></h5>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        
                                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 3rem; height: 3rem;"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 3rem; height: 3rem;"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?> 