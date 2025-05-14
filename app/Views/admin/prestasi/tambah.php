<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<?php
$errors = session()->getFlashdata('errors');
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

    <div class="card-body overflow-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Tambah Prestasi Baru</h5>
        </div>

        <form action="<?= base_url('admin/prestasi/tambah') ?>" method="post">
            <?= csrf_field() ?>

            <div class="row">
                <!-- Kolom kiri: Prestasi, Tingkat, Jenis -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="prestasi" class="form-label">Nama Prestasi</label>
                        <input type="text" name="prestasi" id="prestasi"
                            class="form-control <?= isset($errors['prestasi']) ? 'is-invalid' : '' ?>"
                            required maxlength="128"
                            oninput="updateCharCount('prestasi', 'prestasiCount', 128)"
                            value="<?= old('prestasi'); ?>">
                        <small id="prestasiCount" class="form-text text-muted d-inline-block mt-2">0 / 128 karakter</small>
                        <?php if (isset($errors['prestasi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['prestasi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat Prestasi</label>
                        <select name="tingkat" id="tingkat"
                            class="form-select <?= isset($errors['tingkat']) ? 'is-invalid' : '' ?>"
                            required>
                            <option value="Kabupaten/Kota" <?= old('tingkat') === 'Kabupaten/Kota' ? 'selected' : '' ?>>Kabupaten/Kota</option>
                            <option value="Provinsi" <?= old('tingkat') === 'Provinsi' ? 'selected' : '' ?>>Provinsi</option>
                            <option value="Nasional" <?= old('tingkat') === 'Nasional' ? 'selected' : '' ?>>Nasional</option>
                            <option value="Internasional" <?= old('tingkat') === 'Internasional' ? 'selected' : '' ?>>Internasional</option>
                        </select>
                        <?php if (isset($errors['tingkat'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['tingkat']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Prestasi</label>
                        <select name="jenis" id="jenis"
                            class="form-select <?= isset($errors['jenis']) ? 'is-invalid' : '' ?>"
                            required>
                            <option value="Prestasi Siswa" <?= old('jenis') === 'Prestasi Siswa' ? 'selected' : '' ?>>Prestasi Siswa</option>
                            <option value="Prestasi Pengajar" <?= old('jenis') === 'Prestasi Pengajar' ? 'selected' : '' ?>>Prestasi Pengajar</option>
                            <option value="Prestasi Lembaga" <?= old('jenis') === 'Prestasi Lembaga' ? 'selected' : '' ?>>Prestasi Lembaga</option>
                        </select>
                        <?php if (isset($errors['jenis'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['jenis']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Kolom kanan: Deskripsi dan Gambar -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Prestasi</label>
                        <textarea name="deskripsi" id="deskripsi"
                            class="form-control <?= isset($errors['deskripsi']) ? 'is-invalid' : '' ?>"
                            required maxlength="5000" rows="5"
                            oninput="updateCharCount('deskripsi', 'deskripsiCount', 5000)"><?= old('deskripsi'); ?></textarea>
                        <small id="deskripsiCount" class="form-text text-muted d-inline-block mt-2">0 / 5000 karakter</small>
                        <?php if (isset($errors['deskripsi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['deskripsi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_id" class="form-label">Gambar</label>
                        <select name="gambar_id" id="gambar_id" 
                            class="form-select <?= isset($errors['gambar_id']) ? 'is-invalid' : '' ?>"
                            onchange="previewGambar()">
                            <option value="" data-nama-file="default.jpg" selected>-- Tanpa Gambar --</option>
                            <?php foreach ($list_gambar as $gambar): ?>
                                <option value="<?= $gambar->gambar_id ?>" data-nama-file="<?= $gambar->nama_file ?>"
                                    <?= old('gambar_id') == $gambar->gambar_id ? 'selected' : '' ?>>
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
                                src="<?= base_url('assets/img/upload/' . (old('gambar_id') ? $list_gambar[array_search(old('gambar_id'), array_column($list_gambar, 'gambar_id'))]->nama_file : 'default.jpg')) ?>"
                                alt="Preview Gambar"
                                class="img-thumbnail" style="max-height: 300px; max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success text-white">Simpan</button>
                <a href="<?= base_url('admin/prestasi') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
    function updateCharCount(inputId, counterId, maxLength) {
        const input = document.getElementById(inputId);
        const counter = document.getElementById(counterId);
        const currentLength = input.value.length;
        counter.textContent = `${currentLength} / ${maxLength} karakter`;
    }

    // Initialize character counters
    document.addEventListener('DOMContentLoaded', function() {
        updateCharCount('prestasi', 'prestasiCount', 128);
        updateCharCount('tingkat', 'tingkatCount', 128);
        updateCharCount('jenis', 'jenisCount', 128);
        updateCharCount('deskripsi', 'deskripsiCount', 5000);
    });

    function previewGambar() {
        const selectedOption = document.getElementById('gambar_id').options[document.getElementById('gambar_id').selectedIndex];
        const previewImage = document.getElementById('preview');
        const namaFile = selectedOption.getAttribute('data-nama-file');

        if (selectedOption.value) {
            previewImage.src = '<?= base_url('assets/img/upload/') ?>' + namaFile;
        } else {
            previewImage.src = '<?= base_url('assets/img/upload/default.jpg') ?>';
        }
    }
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?> 