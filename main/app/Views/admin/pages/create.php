<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Tambah Halaman</h4>

<form method="post" action="<?= base_url('admin/pages/store') ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php if (!empty($kategori_pages) && is_array($kategori_pages)): ?>
                <?php foreach ($kategori_pages as $kategori): ?>
                    <option value="<?= $kategori['id'] ?>"><?= esc($kategori['nama_kategori']) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Isi Halaman</label>
        <textarea name="content" class="form-control summernote" required></textarea>
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="2M">
    </div>
    <div class="mb-3">
        <label>Link YouTube (Opsional)</label>
        <input type="text" name="link_yt" class="form-control" placeholder="https://www.youtube.com/watch?v=xxxxxx">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/pages') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
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
        // Auto generate slug
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