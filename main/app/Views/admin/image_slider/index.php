<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<h4>Daftar Gambar Slider</h4>
<a href="<?= base_url('admin/image-slider/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Gambar</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sliders as $slider): ?>
            <tr>
                <td>
                    <img src="<?= base_url('uploads/image_slider/' . $slider['image']) ?>" alt="slider" width="150" class="img-thumbnail">
                </td>
                <td><?= esc($slider['created_at']) ?></td>
                <td>
                    <a href="<?= base_url('admin/image-slider/edit/' . $slider['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/image-slider/delete/' . $slider['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus gambar ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
