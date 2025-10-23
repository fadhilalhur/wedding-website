<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>
<h4>Edit Dokter</h4>

<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="<?= esc($doctor['name']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Pilih Poli</label>
        <select name="poli" class="form-select" required>
            <option value="">-- Pilih Poli --</option>
            <?php foreach ($polis as $row): ?>
                <option value="<?= esc($row['name']) ?>" <?= ($row['name'] == $doctor['poli']) ? 'selected' : '' ?>>
                    <?= esc($row['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Spesialisasi</label>
        <select name="specialization" class="form-select" required>
            <option value="">-- Pilih Spesialis --</option>
            <?php foreach ($spesialis as $row): ?>
                <option value="<?= esc($row['name']) ?>" <?= ($row['name'] == $doctor['specialization']) ? 'selected' : '' ?>>
                    <?= esc($row['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Upload Foto (kosongkan jika tidak diganti)</label>
        <input type="file" name="photo" id="photoInput" accept="image/*" class="form-control">

        <!-- hidden foto lama -->
        <input type="hidden" name="old_photo" value="<?= esc($doctor['photo']) ?>">

        <!-- Preview foto baru -->
        <div id="previewContainer" class="mt-2" style="display:none;">
            <label>Preview Foto Baru:</label><br>
            <img id="previewImage" src="#" alt="Preview Foto" style="max-height:200px; border:1px solid #ccc; padding:4px;">
        </div>

        <!-- Preview foto lama -->
        <?php if (!empty($doctor['photo'])): ?>
            <div class="mt-2">
                <label>Foto Lama:</label><br>
                <img src="<?= base_url('uploads/doctor/' . $doctor['photo']) ?>" style="max-height:200px; border:1px solid #ccc; padding:4px;">
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/doctors') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    document.getElementById('photoInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('previewImage');
                const container = document.getElementById('previewContainer');
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<?= $this->endSection(); ?>
