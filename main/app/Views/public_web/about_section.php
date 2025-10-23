<?php $this->extend('layouts/public_web'); ?>
<?php $this->section('content'); ?>
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p>Profil singkat Rumah Sakit Mitra Husada Pringsewu.</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= !empty($about['gambar']) ? base_url($about['gambar']) : base_url('assets/public/assets/img/about.jpg') ?>" class="img-fluid" alt="">
                <?php if (!empty($about['link_yt'])): ?>
                    <a href="<?= esc($about['link_yt']) ?>" class="glightbox pulsating-play-btn"></a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                <h3><?= esc($about['title'] ?? 'Tentang Kami') ?></h3>
                <div style="text-align:justify">
                    <?= !empty($about['content']) ? $about['content'] : '<p>RS Mitra Husada Pringsewu adalah rumah sakit yang berkomitmen memberikan pelayanan kesehatan terbaik dengan fasilitas modern, tenaga medis profesional, dan layanan ramah untuk masyarakat Pringsewu dan sekitarnya.</p>' ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /About Section -->
<?php $this->endSection(); ?>
