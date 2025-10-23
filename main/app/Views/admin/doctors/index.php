<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar Dokter</h4>
<div class="row justify-content-start">
    <div class="col-auto">
        <a href="<?= base_url('admin/doctors/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah Dokter</a>
    </div>
</div>
<table class="table datatable">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Spesialisasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($doctors as $doctor): ?>
            <tr>
                <td>
                    <?php if (!empty($doctor['photo'])): ?>
                        <img src="<?= base_url('uploads/doctor/' . $doctor['photo']) ?>" alt="Foto" style="height: 60px; border-radius: 6px;">
                    <?php else: ?>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>
                <td><?= esc($doctor['name']) ?></td>
                <td><?= esc($doctor['specialization']) ?></td>
                <td>
                    <a href="<?= base_url('admin/doctors/edit/' . $doctor['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/doctors/delete/' . $doctor['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->endSection(); ?>