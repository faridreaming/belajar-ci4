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
                    $isLast = $i == $totalSegments - 1;
                    ?>
                    <li class="breadcrumb-item <?= $isLast ? 'active' : '' ?>" <?= $isLast ? 'aria-current="page"' : '' ?>>
                        <?php if (!$isLast): ?>
                            <a class="text-decoration-none" href="<?= $link ?>"><?= ucfirst($segment) ?></a>
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
            <h5 class="card-title">Edit Berita</h5>
        </div>

        <form action="<?= base_url('admin/berita/' . $berita->berita_id) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="slug" value="<?= $berita->slug ?>">

            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control <?= isset($errors['judul']) ? 'is-invalid' : '' ?>"
                            required maxlength="128"
                            oninput="updateCharCount('judul', 'judulCount', 128)"
                            value="<?= old('judul', $berita->judul); ?>">
                        <small id="judulCount" class="form-text text-muted d-inline-block mt-2">0 / 128 karakter</small>
                        <?php if (isset($errors['judul'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['judul']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-md-0 mb-3">
                        <label for="isi" class="form-label">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="10"
                            class="form-control <?= isset($errors['isi']) ? 'is-invalid' : '' ?>"
                            required maxlength="5000"
                            oninput="updateCharCount('isi', 'isiCount', 5000)"><?= old('isi', $berita->isi); ?></textarea>
                        <small id="isiCount" class="form-text text-muted d-inline-block mt-2">0 / 5000 karakter</small>
                        <?php if (isset($errors['isi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['isi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gambar_id" class="form-label">Pilih Gambar</label>
                        <select name="gambar_id" id="gambar_id"
                            class="form-select <?= isset($errors['gambar_id']) ? 'is-invalid' : '' ?>"
                            onchange="previewGambar()">
                            <option value="" data-nama-file="default.jpg">-- Tanpa Gambar --</option>
                            <?php foreach ($list_gambar as $gambar): ?>
                                <option value="<?= $gambar->gambar_id ?>"
                                    data-nama-file="<?= $gambar->nama_file ?>"
                                    <?= old('gambar_id', $berita->gambar_id) == $gambar->gambar_id ? 'selected' : '' ?>>
                                    <?= esc($gambar->judul) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['gambar_id'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['gambar_id']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preview Gambar</label>
                        <div>
                            <img id="preview"
                                src="<?= base_url('assets/img/upload/' . ($berita->nama_file_gambar ?? 'default.jpg')) ?>"
                                alt="Preview Gambar"
                                class="img-thumbnail" style="max-height: 300px; max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success text-white">Simpan</button>
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
