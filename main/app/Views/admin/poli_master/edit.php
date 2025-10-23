<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<h4>Edit Poli</h4>
<form method="post" enctype="multipart/form-data" action="<?= base_url('admin/poli_master/update/' . $poli['id']) ?>">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="<?= esc($poli['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= esc($poli['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Foto</label><br>
        <?php if ($poli['photo']): ?>
            <img src="<?= base_url('uploads/poli/' . $poli['photo']) ?>" height="80"><br>
        <?php endif; ?>
        <input type="file" name="photo" class="form-control mt-2">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>
