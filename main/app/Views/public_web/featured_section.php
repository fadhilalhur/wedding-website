<?php $this->extend('layouts/public_web'); ?>
<?php $this->section('content'); ?>
<section id="features" class="features section">
    <div class="container">
        <div class="row justify-content-around gy-4">
            <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= !empty($sejarah['gambar']) ? base_url($sejarah['gambar']) : base_url('assets/public/assets/img/features.jpg') ?>" alt="">
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <h3><?= esc($sejarah['title'] ?? 'Sejarah RS Mitra Husada Pringsewu') ?></h3>
                <div style="text-align:justify">
                    <?= !empty($sejarah['content']) ? $sejarah['content'] : '<p>Belum ada data sejarah rumah sakit.</p>' ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Features Section -->
<?php $this->endSection(); ?>
