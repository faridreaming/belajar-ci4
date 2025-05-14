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
        <div class="d-flex flex-column gap-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0">Daftar Berita</h5>
                <a href="<?= base_url('admin/berita/tambah'); ?>" class="btn btn-success text-white rounded-pill px-3">
                    Tambah Berita <i class="bi bi-plus-lg"></i>
                </a>
            </div>
            <form action="<?= base_url('admin/berita') ?>" method="GET">
                <div class="input-group">
                    <input type="text"
                        class="form-control"
                        name="search"
                        value="<?= esc($search ?? '') ?>"
                        placeholder="Cari berita berdasarkan judul atau isi..."
                        aria-label="Search"
                        aria-describedby="search-addon">
                    <button type="submit" class="input-group-text" id="search-addon">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div id="successAlert" class="alert alert-success fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table align-middle" id="tabel-berita">
                <thead class="table-light">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">BERITA</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $page = service('request')->getGet('page') ?? 1;
                    $perPage = 5;
                    $nomor = ($page - 1) * $perPage + 1;
                    ?>
                    <?php if (empty($list_berita)): ?>
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                <div class="text-muted fst-italic">Belum ada berita.</div>
                            </td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($list_berita as $berita): ?>
                        <tr>
                            <th scope="row"><?= $nomor++; ?></th>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-3 align-items-start align-items-sm-center">
                                    <img src="<?= $berita->gambar_id ? base_url('assets/img/upload/' . $berita->nama_file_gambar) : base_url('assets/img/upload/default.jpg'); ?>"
                                        alt="<?= $berita->slug; ?>"
                                        class="img-fluid object-fit-cover rounded-1"
                                        style="width: 4rem; height: 4rem;">
                                    <div>
                                        <span class="fw-semibold text-truncate judul-berita" title="<?= esc($berita->judul); ?>">
                                            <?= esc($berita->judul); ?>
                                        </span>
                                        <br>
                                        <small class="text-muted">
                                            <?php
                                            $createdAt = new DateTime($berita->created_at);
                                            $updatedAt = new DateTime($berita->updated_at);
                                            ?>
                                            Dibuat: <?= $createdAt->format('j F Y, H:i') ?> <br>
                                            Diubah: <?= $updatedAt->format('j F Y, H:i') ?>
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-nowrap gap-1">
                                    <a class="btn btn-sm btn-success text-white" target="_blank" title="Lihat berita" href="<?= base_url('berita/' . $berita->slug); ?>">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary" title="Edit berita" href="<?= base_url('admin/berita/edit/' . $berita->berita_id); ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="<?= base_url('admin/berita/' . $berita->berita_id); ?>" method="POST" class="d-inline form-hapus">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-sm btn-danger btn-trigger-hapus" title="Hapus berita" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('default', 'default') ?>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger rounded-pill" id="btnConfirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>