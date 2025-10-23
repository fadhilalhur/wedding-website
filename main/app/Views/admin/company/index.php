<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Profil Perusahaan</h4>
<?php if (session('success')): ?>
    <div class="alert alert-success"> <?= session('success') ?> </div>
<?php endif; ?>
<table class="table">
    <tr><th>Nama</th><td><?= esc($company['name']) ?></td></tr>
    <tr><th>Logo</th><td><img src="<?= base_url($company['logo']) ?>" width="100"></td></tr>
    <tr><th>Alamat</th><td><?= esc($company['address']) ?></td></tr>
    <tr><th>Telepon</th><td><?= esc($company['phone']) ?></td></tr>
    <tr><th>Lokasi Maps</th><td><a href="<?= esc($company['maps_location']) ?>" target="_blank">Lihat di Google Maps</a></td></tr>
</table>
<a href="<?= base_url('admin/company/edit') ?>" class="btn btn-primary">Edit Profil</a>
<?php $this->endSection(); ?>
