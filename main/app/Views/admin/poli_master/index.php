<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<h4>Data Poli</h4>
<a href="<?= base_url('admin/poli_master/create') ?>" class="btn btn-success mb-3">+ Tambah Poli</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($poli as $row): ?>
            <tr>
                <td><img src="<?= base_url('uploads/poli/' . $row['photo']) ?>" height="60"></td>
                <td><?= esc($row['name']) ?></td>
                <td><?= esc($row['deskripsi']) ?></td>
                <td>
                    <a href="<?= base_url('admin/poli_master/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/poli_master/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>
