<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar Jadwal</h4>
<div class="row justify-content-start">
    <div class="col-auto">
        <a href="<?= base_url('admin/schedules/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah Jadwal</a>
    </div>
</div>
<table class="table datatable">

    <thead>
        <tr>
            <th>Dokter</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam selesai</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($schedules as $item): ?>
            <tr>
                <td><?= esc($item['nama_dokter']) ?></td>
                <td><?= esc($item['hari']) ?></td>

                <td><?= esc($item['jam_mulai']) ?></td>
                <td><?= esc($item['jam_selesai']) ?></td>
                <td><?= esc($item['keterangan']) ?></td>
                <td>
                    <a href="<?= base_url('admin/schedules/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/schedules/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->endSection(); ?>