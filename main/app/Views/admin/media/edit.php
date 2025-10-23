<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Edit Media</h4>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>File Lama</label><br>
        <span><?= esc($media['file_name']) ?></span>
    </div>
    <div class="mb-3">
        <label>Ganti File</label>
        <input type="file" name="media_file" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/media') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
