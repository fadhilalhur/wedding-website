<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Edit Asuransi</h4>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= esc($asuransi['nama']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?= esc($asuransi['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Logo (kosongkan jika tidak diganti)</label>
        <input type="file" name="logo" class="form-control" accept="image/*">
        <?php if ($asuransi['logo']): ?>
            <div class="mt-2">
                <img src="<?= base_url('uploads/asuransi/' . $asuransi['logo']) ?>" style="height:80px;">
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/asuransi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
