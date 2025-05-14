<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5 py-5">
    <div class="mb-4 mb-lg-0 text-center">
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
        <h1 class="fw-bold mb-3">PROFIL RA AR-RAYHAN</h1>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Visi Section -->
            <div class="col-md-6">
                <div class="p-4 h-100 rounded bg-success text-white">
                    <h3 class="fw-bold mb-3 text-center">VISI</h3>
                    <p class="mb-0 lead text-center">Menjadikan peserta didik yang beriman, berakhlakul karimah, cerdas, terampil, dan mandiri.</p>
                </div>
            </div>

            <!-- Misi Section -->
            <div class="col-md-6">
                <div class="p-4 h-100 rounded bg-success text-white">
                    <h3 class="fw-bold mb-3 text-center">MISI</h3>
                    <ol class="ps-3">
                        <li>Menanamkan keimanan peserta didik melalui pengamalan ajaran agama islam.</li>
                        <li>Melaksanakan pembiasaan berprilaku sesuai nilai-nilai ajaran agama islam.</li>
                        <li>Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah.</li>
                        <li>Mengembangkan minat, bakat dan potensi peserta didik sejak dini.</li>
                        <li>Membina kemandirian peserta didik melalui pembiasaan yang terencana dan berkesinambungan.</li>
                    </ol>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="col-12 mt-5">
                <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">INFORMASI UMUM RA AR-RAYHAN</h2>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless mb-4 mb-md-0">
                            <tr>
                                <th scope="row">NSM</th>
                                <td>:</td>
                                <td>101212710246</td>
                            </tr>
                            <tr>
                                <th scope="row">NPSN</th>
                                <td>:</td>
                                <td>69730224</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>:</td>
                                <td>Swasta</td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah Siswa</th>
                                <td>:</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td>Jln. Denai Gang Aneka No. 4b</td>
                            </tr>
                            <tr>
                                <th scope="row">Kabupate/Kota</th>
                                <td>:</td>
                                <td>Kota Medan</td>
                            </tr>
                            <tr>
                                <th scope="row">Provinsi</th>
                                <td>:</td>
                                <td>Sumatera Utara</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <figure class="mb-0">
                            <img src="<?= base_url('assets/img/sertifikat-akreditasi.webp'); ?>" alt="Sertifikat Akreditasi" class="img-fluid w-100 border rounded sertifikat-akreditasi" data-bs-toggle="modal" data-bs-target="#sertifikatModal">
                            <figcaption class="text-center mt-2 text-muted">Sertifikat Akreditasi RA Ar-Rayhan</figcaption>
                        </figure>

                        <!-- Modal -->
                        <div class="modal fade" id="sertifikatModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content bg-transparent border-0 p-0">
                                    <div class="text-end">
                                        <button type="button" class="btn-close bg-white mb-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <img src="<?= base_url('assets/img/sertifikat-akreditasi.webp'); ?>" alt="Sertifikat Akreditasi" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sejarah Section -->
            <div class="col-12 mt-5">
                <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">SEJARAH RA AR-RAYHAN</h2>
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <img src="<?= base_url('assets/img/sejarah.jpg'); ?>" alt="Sejarah RA Ar-Rayhan" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <p>RA Ar-Rayhan didirikan pada bulan Mei tahun 2011 di bawah naungan Yayasan Ar-Rayhan Medan sebagai bentuk komitmen yayasan dalam memberikan layanan pendidikan usia dini yang berkualitas. Sejak awal berdirinya, RA Ar-Rayhan hadir untuk menjawab kebutuhan masyarakat akan pendidikan anak usia dini yang berbasis nilai-nilai keislaman dan pendekatan pembelajaran yang menyenangkan. Dengan konsep belajar sambil bermain, RA Ar-Rayhan menerapkan Kurikulum Merdeka sebagai dasar pembelajaran untuk mengembangkan potensi anak secara holistik, baik dalam aspek spiritual, intelektual, maupun sosial emosional. Kini, RA Ar-Rayhan telah berkembang menjadi lembaga pendidikan yang dipercaya oleh masyarakat, terbukti dengan jumlah peserta didik yang terus meningkat dan akreditasi A dari BAN-PAUD dan PNF sebagai pengakuan atas kualitas penyelenggaraan pendidikannya.</p>
                    </div>
                </div>
            </div>

            <!-- Pengajar Section -->
            <div class="col-12 mt-5">
                <h2 class="fw-bold text-success mb-4 border-start border-success border-4 ps-3">PENGAJAR RA AR-RAYHAN</h2>
                <div class="row g-4">
                    <div class="col-md-4 pengajar">
                        <div class="p-4 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/pengajar/feldy-iskandar-spdi.png'); ?>" alt="Pengajar 2"></div>
                            <h5 class="fw-bold text-center">Feldy Iskandar, S.Pd.I</h5>
                            <hr>
                            <ul>
                                <li>
                                    <p class="mb-0 fw-medium">S1 Pendidikan Agama Islam</p>
                                    <p class="small text-secondary mb-0">Sekolah Tinggi Agama Islam Sumatera Medan (STAIS)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 pengajar">
                        <div class="p-4 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/pengajar/nurlaily-sag-spd.png'); ?>" alt="Pengajar 1"></div>
                            <h5 class="fw-bold mb-3 text-center">Nurlaily, S.Ag., S.Pd</h5>
                            <hr>
                            <ul>
                                <li>
                                    <p class="mb-0 fw-medium">S1 Syariah</p>
                                    <p class="small text-secondary mb-0">Institut Agama Islam Negeri Medan (IAIN)</p>
                                </li>
                                <li>
                                    <p class="mb-0 fw-medium">S1 Pendidikan Islam Anak Usia Dini (PIAUD)</p>
                                    <p class="small text-secondary mb-0">Sekolah Tinggi Agama Islam Al Hikmah Medan (STAIA)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 pengajar">
                        <div class="p-4 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/pengajar/amiratul-munawwaroh-spd.png'); ?>" alt="Pengajar 3"></div>
                            <h5 class="fw-bold mb-3 text-center">Amiratul Munawwaroh, S.Pd</h5>
                            <hr>
                            <ul>
                                <li>
                                    <p class="mb-0 fw-medium">S1 Pendidikan Anak Usia Dini (PAUD)</p>
                                    <p class="small text-secondary mb-0">Universitas Negeri Medan (UNIMED)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>