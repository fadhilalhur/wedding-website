<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Edit User</h4>
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

<form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Password (Kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin" <?= $user['role']==='admin'?'selected':'' ?>>Admin</option>
            <option value="editor" <?= $user['role']==='editor'?'selected':'' ?>>Editor</option>
            <option value="user" <?= $user['role']==='user'?'selected':'' ?>>User</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $this->endSection(); ?>
