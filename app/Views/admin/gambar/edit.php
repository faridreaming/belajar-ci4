<?= $this->extend('layouts/admin_layout'); ?>

<?= $this->section('content'); ?>
<?php
$errors = session()->getFlashdata('errors');
$uri = service('uri');
$totalSegments = $uri->getTotalSegments();
?>

<div class="card">
    <div class="card-header bg-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <?php for ($i = 1; $i <= $totalSegments - 1; $i++): ?>
                    <?php
                    $segment = $uri->getSegment($i);
                    $link = base_url(implode('/', array_slice($uri->getSegments(), 0, $i)));
                    $isLast = $i === $totalSegments - 1;
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

    <div class="card-body overflow-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Edit Gambar "<?= $gambar->judul; ?>"</h5>
        </div>

        <form action="<?= base_url('admin/gambar/' . $gambar->gambar_id) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $gambar->gambar_id; ?>">
            <input type="hidden" name="gambar_lama" value="<?= $gambar->nama_file; ?>">

            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control <?= isset($errors['judul']) ? 'is-invalid' : '' ?>"
                            required maxlength="128"
                            oninput="updateCharCount('judul', 'judulCount', 128)"
                            value="<?= old('judul', $gambar->judul); ?>">
                        <small id="judulCount" class="form-text text-muted d-inline-block mt-2">0 / 128 karakter</small>
                        <?php if (isset($errors['judul'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['judul']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Gambar</label>
                        <select class="form-select <?= isset($errors['jenis']) ? 'is-invalid' : '' ?>" name="jenis" required>
                            <option value="Prestasi" <?= old('jenis', $gambar->jenis) === 'Prestasi' ? 'selected' : ''; ?>>Prestasi</option>
                            <option value="Kegiatan" <?= old('jenis', $gambar->jenis) === 'Kegiatan' ? 'selected' : ''; ?>>Kegiatan</option>
                            <option value="Lainnya" <?= old('jenis', $gambar->jenis) === 'Lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                        <?php if (isset($errors['jenis'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['jenis']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-md-0 mb-3">
                        <label for="file_gambar" class="form-label">File Gambar</label>
                        <input type="file" name="file_gambar" id="file_gambar"
                            class="form-control <?= isset($errors['file_gambar']) ? 'is-invalid' : '' ?>"
                            accept="image/*" onchange="previewFileGambar(event)">
                        <?php if (isset($errors['file_gambar'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['file_gambar']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Kolom kanan: Preview -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Preview Gambar</label>
                        <div>
                            <img id="preview"
                                src="<?= base_url('assets/img/upload/') . $gambar->nama_file; ?>"
                                alt="Preview Gambar"
                                class="img-thumbnail"
                                style="max-height: 300px; max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success text-white">Simpan</button>
                <a href="<?= base_url('admin/gambar') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
