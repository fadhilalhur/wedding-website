<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<h4>Edit Jadwal</h4>
<form method="post">
    <!-- Dokter -->
    <div class="mb-3">
        <label>Dokter</label>
        <select name="name_dokter" class="form-select" required>
            <option value="">-- Pilih Dokter --</option>
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?= esc($doctor['name']) ?>" <?= $doctor['name'] == $schedule['nama_dokter'] ? 'selected' : '' ?>>
                    <?= esc($doctor['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Hari -->
    <div class="mb-3">
        <label>Hari</label>
        <select name="hari" class="form-select" required>
            <option value="">-- Pilih Hari --</option>
            <?php 
                $days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                foreach ($days as $day): 
            ?>
                <option value="<?= $day ?>" <?= $schedule['hari'] == $day ? 'selected' : '' ?>>
                    <?= $day ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Jam Mulai -->
    <div class="mb-3">
        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" class="form-control" value="<?= esc($schedule['jam_mulai']) ?>" required>
    </div>

    <!-- Jam Selesai -->
    <div class="mb-3">
        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" class="form-control" value="<?= esc($schedule['jam_selesai']) ?>" required>
    </div>

    <!-- Keterangan -->
    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" name="description" class="form-control" value="<?= esc($schedule['keterangan']) ?>">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/schedules') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?php $this->endSection(); ?>
