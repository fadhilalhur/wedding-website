<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Edit Halaman</h4>

<form method="post" action="<?= base_url('admin/pages/update/' . $page['id']) ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="<?= esc($page['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="<?= esc($page['slug']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php if (!empty($kategori_pages) && is_array($kategori_pages)): ?>
                <?php foreach ($kategori_pages as $kategori): ?>
                    <option value="<?= $kategori['id'] ?>" <?= $kategori['id'] == $page['kategori_id'] ? 'selected' : '' ?>>
                        <?= esc($kategori['nama_kategori']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Isi Halaman</label>
        <textarea name="content" class="form-control summernote" required><?= esc($page['content']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="dropify"
            data-default-file="<?= !empty($page['gambar']) ? base_url(ltrim($page['gambar'], '/')) : '' ?>"
            data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="2M">
    </div>
    <div class="mb-3">
        <label>Link YouTube (Opsional)</label>
        <input type="text" name="link_yt" class="form-control" value="<?= esc($page['link_yt'] ?? '') ?>" placeholder="https://www.youtube.com/watch?v=xxxxxx">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/pages') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>

<?php $this->section('styles'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/libs/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/libs/dropify/dist/css/dropify.min.css">
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300
        });
        $('.dropify').dropify();
        $('input[name="title"]').on('input', function() {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter aneh
                .replace(/\s+/g, '-') // Ganti spasi dengan -
                .replace(/-+/g, '-'); // Ganti -- jadi -
            $('input[name="slug"]').val(slug);
        });
    });
</script>
<?php $this->endSection(); ?>