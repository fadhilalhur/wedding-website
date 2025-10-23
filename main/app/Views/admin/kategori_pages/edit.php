<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Edit Kategori Halaman</h4>
<form action="<?= base_url('admin/kategori-pages/update/' . $kategori['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="<?= esc($kategori['nama_kategori']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Slug Kategori</label>
        <input type="text" name="slug_kategori" class="form-control" value="<?= esc($kategori['slug_kategori']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Gambar Kategori (Opsional)</label>
        <input type="file" name="gambar" class="dropify"
            data-default-file="<?= base_url($kategori['gambar'] ?? '') ?>"
            data-allowed-file-extensions="jpg jpeg png webp"
            data-max-file-size="5M">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/kategori-pages') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/admin/libs/dropify/dist/js/dropify.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();

        $('input[name="nama_kategori"]').on('input', function() {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');   
            $('input[name="slug_kategori"]').val(slug);
        });
    });
</script>
<?= $this->endSection(); ?>