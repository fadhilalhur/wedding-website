<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Tambah Media</h4>
<form action="<?= base_url('admin/media/create') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>File</label>
        <input type="file" name="media_file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/media') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
