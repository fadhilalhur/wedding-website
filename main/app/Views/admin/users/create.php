<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Tambah User</h4>
<?php if (isset($validation)) : ?>
    <div class="alert alert-danger">
        <ul>
        <?php if (is_object($validation) && method_exists($validation, 'listErrors')): ?>
            <?= $validation->listErrors() ?>
        <?php else: ?>
            <?php foreach ($validation as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= base_url('admin/users/store') ?>" method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
