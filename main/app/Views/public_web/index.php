
<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>

<!-- Hero Section -->
 
<?= view('public_web/dashboard') ?>

<!-- Visi Misi -->
<?php if (!empty($companyVisiMisi)) : ?>
    <?= view('public_web/visi_misi2', ['companyVisiMisi' => $companyVisiMisi]) ?>
<?php endif; ?>

<!-- Layanan / Berita -->
<?php if (!empty($news)) : ?>
    <?= view('public_web/services_section', ['news' => $news]) ?>
<?php endif; ?>

<!-- Fasilitas -->
<?php if (!empty($fasilitas)) : ?>
    <?= view('public_web/tabs_section', ['fasilitas' => $fasilitas]) ?>
<?php endif; ?>

<!-- Tentang Kami -->
<?php if (!empty($about)) : ?>
    <?= view('public_web/about_section', ['about' => $about]) ?>
<?php endif; ?>

<?= $this->endSection(); ?>
