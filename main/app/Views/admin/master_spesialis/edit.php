<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Edit Spesialis</h4>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama Spesialis</label>
        <input type="text" name="name" class="form-control" value="<?= esc($spesialis['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?= esc($spesialis['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Thumbnail (kosongkan jika tidak diubah)</label>
        <input type="file" name="photo" class="dropify" data-default-file="<?= base_url('uploads/spesialis/' . $spesialis['photo']) ?>" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="2M">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/master-spesialis') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
<?php $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/libs/dropify/dist/css/dropify.min.css">
<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/libs/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
<?php $this->endSection() ?>