<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Edit Profil Perusahaan</h4>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="<?= esc($company['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Logo</label><br>
        <?php if ($company['logo']): ?>
            <img src="<?= base_url($company['logo']) ?>" width="100"><br>
        <?php endif; ?>
        <input type="file" name="logo" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="address" class="form-control" required><?= esc($company['address']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="phone" class="form-control" value="<?= esc($company['phone']) ?>">
    </div>
    <div class="mb-3">
        <label>Google Maps Location (Link)</label>
        <input type="text" name="maps_location" class="form-control" value="<?= esc($company['maps_location']) ?>">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/company') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
