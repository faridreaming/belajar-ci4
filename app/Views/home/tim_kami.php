<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="hero">
    <div class="container mt-5 py-5">
        <div class="mb-4 mb-lg-0 text-center">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="mb-4 hero-logo">
            <h1 class="fw-bold mb-3 text-white">TIM KAMI</h1>
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-12 mt-5">
                <div class="row g-4">
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/muhammad-fattah.png'); ?>" alt="Chief Information Officer (CIO)"></div>
                            <h5 class="fw-bold text-center">Muhammad Fattah</h5>
                            <p class="text-center">Chief Information Officer (CIO)</p>
                        </div>
                    </div>
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/riska-khairani-nasution.png'); ?>" alt="System Analyst"></div>
                            <h5 class="fw-bold text-center">Riska Khairani Nasution</h5>
                            <p class="text-center">System Analyst</p>
                        </div>
                    </div>
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/vico-zefanya-hutauruk.png'); ?>" alt="System Analyst"></div>
                            <h5 class="fw-bold text-center">Vico Zefanya Hutauruk</h5>
                            <p class="text-center">System Analyst</p>
                        </div>
                    </div>
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/ahmad-reza-aulia-siregar.png'); ?>" alt="Programmer"></div>
                            <h5 class="fw-bold text-center">Ahmad Reza Aulia Siregar</h5>
                            <p class="text-center">Programmer</p>
                        </div>
                    </div>
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/m-sibawaihi-shiddiq-tarigan.png'); ?>" alt="Programmer"></div>
                            <h5 class="fw-bold text-center">M. Sibawaihi Shiddiq Tarigan</h5>
                            <p class="text-center">Programmer</p>
                        </div>
                    </div>
                    <div class="col-md-4 tim-kami">
                        <div class="p-2 h-100 bg-light rounded">
                            <div class="mb-3 rounded-circle overflow-hidden mx-auto bg-white border"><img src="<?= base_url('assets/img/tim-kami/muhammad-farid-yamin.png'); ?>" alt="Programmer"></div>
                            <h5 class="fw-bold text-center">Muhammad Farid Yamin</h5>
                            <p class="text-center">Programmer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>