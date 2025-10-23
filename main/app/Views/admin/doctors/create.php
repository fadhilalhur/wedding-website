<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>
<h4>Tambah Dokter</h4>

<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Pilih Poli</label>
        <select name="poli" class="form-select" required>
            <option value="">-- Pilih Poli --</option>
            <?php foreach ($polis as $row): ?>
                <option value="<?= esc($row['name']) ?>"><?= esc($row['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Spesialisasi</label>
        <select name="specialization" class="form-select" required>
            <option value="">-- Pilih Spesialis --</option>
            <?php foreach ($spesialis as $row): ?>
                <option value="<?= esc($row['name']) ?>"><?= esc($row['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="mb-3">
        <label>Upload Foto</label>
        <input type="file" id="photoInput" accept="image/*" class="form-control">
        <input type="hidden" name="photo_cropped" id="photoCropped">

        <!-- Preview langsung setelah crop -->
        <div id="croppedPreviewContainer" class="mt-2" style="display:none;">
            <label>Hasil Crop:</label><br>
            <img id="croppedPreview" src="#" alt="Hasil Crop" style="max-height:200px; border:1px solid #ccc; padding:4px;">
        </div>
    </div>


    <!-- Modal cropper -->
    <div class="modal fade" id="cropperModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Foto Dokter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img id="cropperImage" style="max-width: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop & Gunakan</button>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/doctors') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
    let cropper;
    const input = document.getElementById('photoInput');
    const image = document.getElementById('cropperImage');
    const modal = new bootstrap.Modal(document.getElementById('cropperModal'));
    const result = document.getElementById('photoCropped');

    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                modal.show();
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropperModal').addEventListener('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 5 / 6,
            viewMode: 1
        });
    });

    document.getElementById('cropImageBtn').addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas({
            width: 1024,
            height: 1024
        });
        canvas.toBlob(function(blob) {
            const reader = new FileReader();
            reader.onloadend = function() {
                result.value = reader.result;
                modal.hide();
            };
            reader.readAsDataURL(blob);
        });
    });
    document.getElementById('cropImageBtn').addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 400
        });
        canvas.toBlob(function(blob) {
            const reader = new FileReader();
            reader.onloadend = function() {
                const preview = document.getElementById('croppedPreview');
                const container = document.getElementById('croppedPreviewContainer');

                result.value = reader.result;
                preview.src = reader.result;
                container.style.display = 'block';
                modal.hide();
            };
            reader.readAsDataURL(blob);
        });
    });
</script>
<?= $this->endSection(); ?>