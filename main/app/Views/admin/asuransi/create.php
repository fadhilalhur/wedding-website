<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Tambah Asuransi</h4>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/asuransi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
