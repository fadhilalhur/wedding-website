<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<h4>Edit Berita</h4>
<form action="<?= base_url('admin/news/update/' . $news['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="<?= esc($news['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea id="content" name="content" class="form-control summernote" required><?= esc($news['content']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Gambar Unggulan</label>

        <input type="file" name="featured_image" class="dropify"
            data-default-file="<?= !empty($news['featured_image']) ? base_url(ltrim($news['featured_image'], '/')) : '' ?>"
            data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="2M">
    </div>
    <div class="mb-3">
        <label>Tanggal & Waktu Publish</label>

        <input type="datetime-local" name="published_at" class="form-control"
            value="<?= date('Y-m-d\TH:i', strtotime($news['published_at'])) ?>" required>

    </div>
    <div class="card my-4">
        <div class="card-header">Pengaturan SEO</div>
        <div class="card-body">
            <div class="mb-3">
                <label>Judul SEO</label>
                <input type="text" name="meta_title" value="<?= esc($news['meta_title'] ?? '') ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Deskripsi SEO</label>
                <textarea name="meta_description" class="form-control" rows="3"><?= esc($news['meta_description'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label>Kata Kunci (comma separated)</label>
                <input type="text" name="meta_keywords" value="<?= esc($news['meta_keywords'] ?? '') ?>" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/news') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?= $this->endSection(); ?>
<?php $this->section('scripts'); ?>
<!-- jQuery harus duluan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (dibutuhkan oleh Summernote) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- Dropify JS -->
<script src="<?= base_url('assets/admin/libs/dropify/dist/js/dropify.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ],
            colors: [ // ✅ Optional: custom color palette
                ['#000000', '#424242', '#636363', '#9C9C94'],
                ['#FF0000', '#FF6A00', '#FFD800', '#B6FF00'],
                ['#4CFF00', '#00FF21', '#00FFA2', '#00FFFF'],
                ['#0094FF', '#002AFF', '#4800FF', '#B200FF'],
                ['#FF00DC', '#FF006E', '#FF0000', '#FFFFFF']
            ]
        });

        $('.dropify').dropify();
    });
</script>
<?= $this->endSection(); ?>