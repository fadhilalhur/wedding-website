<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<h4>Tambah Poli</h4>
<form method="post" enctype="multipart/form-data" action="<?= base_url('admin/poli_master/store') ?>">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
<?= $this->endSection() ?>
