 <?php $this->extend('layouts/public_web_v2'); ?>
<?php $this->section('content'); ?>
 <!-- slider_area_start -->

   <?= view('public_web_v2/home_slider') ?>
   <?= view('public_web_v2/fasilitas', ['fasilitas' => $fasilitas]) ?>

   <?= view('public_web_v2/news') ?>
   <?= view('public_web_v2/promo') ?>
   <?= view('public_web_v2/pelayanan_unggulan') ?>
   <?= view('public_web_v2/dokter') ?>


    <!-- slider_area_end -->

<?php $this->endSection(); ?>
