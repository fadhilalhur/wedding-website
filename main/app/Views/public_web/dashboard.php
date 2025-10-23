<?php $this->extend('layouts/public_web'); ?>
<?php $this->section('content'); ?>
<section id="hero" class="hero section position-relative">
    <!-- Static overlay text -->
    <div class="hero-overlay position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index:10; pointer-events:none; background:rgba(0,0,0,0.6); padding:20px; border-radius:8px;">
        <h2 class="text-white">Selamat Datang di Website Resmi <br> Rumah Sakit Mitra Husada Pringsewu</h2>
        <p class="d-none d-md-block">Rumah Sakit Mitra Husada Pringsewu adalah Rumah Sakit yang berfokus pada pelayanan kesehatan yang terbaik.</p>
        <a href="#about" class="btn-get-started">Lihat Profil</a>
    </div>
    <style>
        #hero-carousel .container {
            display: none;
        }
    </style>
    <?php
    $db = \Config\Database::connect();
    $slidernya = $db->table('image_slider')
        ->orderBy('id', 'DESC')
        ->get()->getResultArray();
    ?>
    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <?php foreach ($slidernya as $index => $slider): ?>
        <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
            <img src="<?= base_url("uploads/image_slider/" . $slider['image']) ?>" alt="">
            <!-- <div class="container">
                <h2>Welcome to Medicio</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#about" class="btn-get-started">Read More</a>
            </div> -->
        </div><!-- End Carousel Item -->
        <?php endforeach; ?>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>
    </div>

</section>
<?= $this->endSection() ?>