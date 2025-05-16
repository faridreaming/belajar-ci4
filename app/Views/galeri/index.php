<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-5 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">GALERI RA AR-RAYHAN</h1>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-fill mb-4">
            <?php foreach ($jenisTypes as $jenis): ?>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?= ($activeJenis == $jenis['jenis']) ? 'active' : '' ?>" 
                        href="<?= site_url('galeri?jenis=' . urlencode($jenis['jenis'])) ?>">
                        <i class="bi bi-image me-2"></i>
                        <?= ucfirst($jenis['jenis']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (empty($images)): ?>
            <div class="text-center py-5">
                <div class="text-muted fst-italic">Belum ada gambar untuk kategori ini.</div>
            </div>
        <?php else: ?>
            <!-- Image Grid -->
            <div class="row g-4">
                <?php foreach ($images as $image): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="rounded h-100">
                            <a href="#" 
                                data-bs-toggle="modal" 
                                data-bs-target="#imageModal" 
                                data-bs-slide-to="<?= array_search($image, $images) ?>"
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
                                    <?php foreach ($images as $index => $image): ?>
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

            <!-- Pagination -->
            <div class="mt-4">
                <?= $pager->links('galeri', 'default') ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>