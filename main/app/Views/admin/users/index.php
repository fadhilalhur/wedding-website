<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar User</h4>
<a href="<?= base_url('admin/users/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah User</a>
<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $item): ?>
        <tr>
            <td><?= esc($item['username']) ?></td>
            <td><?= esc($item['email']) ?></td>
            <td><?= esc($item['role']) ?></td>
            <td>
                <a href="<?= base_url('admin/users/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/users/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->endSection(); ?>
