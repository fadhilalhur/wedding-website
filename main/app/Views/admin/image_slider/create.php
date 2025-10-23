<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h4>Tambah Gambar Slider</h4>

<form method="post" action="<?= base_url('admin/image-slider/store') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="image">Gambar</label>
        <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="2M" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/image-slider') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>

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
