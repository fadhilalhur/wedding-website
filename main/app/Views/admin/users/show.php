
<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <h5>Profil User</h5>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Username</dt>
            <dd class="col-sm-9"><?= esc($user['username']) ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?= esc($user['email']) ?></dd>

            <dt class="col-sm-3">Role</dt>
            <dd class="col-sm-9"><?= esc($user['role']) ?></dd>
        </dl>
        <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-primary">Edit Profil</a>
    </div>
</div>

<?= $this->endSection(); ?>