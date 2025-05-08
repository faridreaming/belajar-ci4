<?= $this->extend('layouts/admin_layout'); ?>

<?= $this->section('content'); ?>
<?php
$uri = service('uri');
$totalSegments = $uri->getTotalSegments(); ?>
<div class="card">
    <div class="card-header bg-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <?php for ($i = 1; $i <= $totalSegments; $i++): ?>
                    <?php
                    $segment = $uri->getSegment($i);
                    $link = base_url(implode('/', array_slice($uri->getSegments(), 0, $i)));
                    $isLast = $i == $totalSegments;
                    ?>
                    <li class="breadcrumb-item <?= $isLast ? 'active' : '' ?>" <?= $isLast ? 'aria-current="page"' : '' ?>>
                        <?php if (!$isLast): ?>
                            <a class="text-decoration-none link-success" href="<?= $link ?>"><?= ucfirst($segment) ?></a>
                        <?php else: ?>
                            <?= ucfirst($segment) ?>
                        <?php endif; ?>
                    </li>
                <?php endfor; ?>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-3">
            <h5 class="card-title m-0" style="font-size: 1.25rem;">Daftar Gambar</h5>
            <a href="<?= base_url('admin/gambar/tambah'); ?>" class="btn btn-success text-white rounded-pill px-3">
                Tambah Gambar <i class="bi bi-plus-lg"></i>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div id="successAlert" class="alert alert-success fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="row g-3 justify-content-center mb-3">
            <?php foreach ($list_gambar as $gambar): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                    <div class="card w-100">
                        <img src="<?= base_url('assets/img/upload/') . $gambar->nama_file; ?>"
                            class="card-img-top img-fluid"
                            alt="<?= $gambar->nama_file; ?>"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-truncate" title="<?= $gambar->judul; ?>" style="font-size: 1rem;">
                                <?= $gambar->judul; ?>
                            </h5>
                            <p class="card-text mb-2">
                                <strong>Jenis:</strong> <?= $gambar->jenis; ?><br>
                                <strong>Dibuat:</strong> <?= $gambar->created_at; ?><br>
                                <strong>Diubah:</strong> <?= $gambar->updated_at; ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-2">
                            <a class="btn btn-sm btn-primary"
                                title="Edit gambar"
                                href="<?= base_url('admin/gambar/edit/' . $gambar->gambar_id); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="<?= base_url('admin/gambar/' . $gambar->gambar_id); ?>" method="POST" class="d-inline form-hapus">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button"
                                    class="btn btn-sm btn-danger btn-trigger-hapus"
                                    title="Hapus gambar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?= $pager->links('default', 'default') ?>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel" style="font-size: 1rem;">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" style="font-size: 0.875rem;">
                Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger rounded-pill" id="btnConfirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>