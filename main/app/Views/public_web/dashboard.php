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
        <?php endforeach; ?>

        <!-- <ol class="carousel-indicators"></ol> -->
    </div>

</section>
<?= $this->endSection() ?>