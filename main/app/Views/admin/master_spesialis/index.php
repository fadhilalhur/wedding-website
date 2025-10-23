<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Daftar Spesialis</h4>
<div class="mb-3">
    <a href="<?= base_url('admin/master-spesialis/create') ?>" class="btn btn-primary">Tambah Spesialis</a>
</div>

<table class="table table-bordered datatable">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Thumbnail</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($spesialis as $row): ?>
            <tr>
                <td><?= esc($row['name']) ?></td>
                <td><?= esc($row['deskripsi']) ?></td>
                <td>
                    <?php if ($row['photo']): ?>
                        <img src="<?= base_url('uploads/spesialis/' . $row['photo']) ?>" width="100">
                    <?php else: ?>
                        <em>Tidak ada</em>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('admin/master-spesialis/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/master-spesialis/delete/' . $row['id']) ?>" onclick="return confirm('Hapus spesialis ini?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
