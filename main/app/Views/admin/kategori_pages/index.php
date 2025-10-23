<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar Kategori Halaman</h4>
<div class="row justify-content-start">
    <div class="col-auto">
        <a href="<?= base_url('admin/kategori-pages/create') ?>" class="btn btn-primary mb-3">Tambah Kategori</a>
    </div>
</div>
<table class="table datatable">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama Kategori</th>
            <th>Slug Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($kategori as $i => $row): ?>
            <tr>
                <td>
                    <?php if (!empty($row['gambar'])): ?>
                        <img src="<?= base_url($row['gambar']) ?>" alt="Gambar" style="width: 70px; height: 50px; object-fit: cover; border-radius: 6px;" onclick="showImageModal('<?= base_url('uploads/pages/' . $row['gambar']) ?>')" style="cursor:pointer;">
                    <?php else: ?>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>
                <td><?= esc($row['nama_kategori']) ?></td>
                <td><?= esc($row['slug_kategori']) ?></td>
                <td>
                    <a href="<?= base_url('admin/kategori-pages/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/kategori-pages/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>



    </tbody>
</table>
<?php $this->endSection();
