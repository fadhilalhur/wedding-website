<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<h4>Daftar Asuransi</h4>
<a href="<?= base_url('admin/asuransi/create') ?>" class="btn btn-primary btn-sm mb-3">Tambah Asuransi</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($asuransi as $row): ?>
        <tr>
            <td>
                <?php if ($row['logo']): ?>
                    <img src="<?= base_url('uploads/asuransi/' . $row['logo']) ?>" style="height:60px;">
                <?php else: ?>
                    <span class="text-muted">-</span>
                <?php endif; ?>
            </td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['deskripsi']) ?></td>
            <td>
                <a href="<?= base_url('admin/asuransi/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/asuransi/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
