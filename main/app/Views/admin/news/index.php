<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<h4>Daftar Berita</h4>

<div class="row justify-content-start">
    <div class="col-auto">
        <a href="<?= base_url('admin/news/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah Berita</a>
    </div>
</div>

<table class="table datatable">
    <thead>
        <tr>
            <th>Thumbnail</th> <!-- Tambahan -->
            <th>Judul</th>
            <th>Publish</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $item): ?>
            <tr>
                <td>
                    <?php if (!empty($item['featured_image'])): ?>
                        <img src="<?= base_url(ltrim($item['featured_image'], '/')) ?>"
                            alt="gambar"
                            class="img-thumbnail preview-img"
                            style="width: 80px; height: 60px; object-fit: cover; cursor:pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#imageModal"
                            data-img-src="<?= base_url(ltrim($item['featured_image'], '/')) ?>">
                    <?php else: ?>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>

                <td><?= esc($item['title']) ?></td>
                <td><?= date('d M Y', strtotime($item['published_at'])) ?></td>
                <td>
                    <a href="<?= base_url('admin/news/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/news/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Modal Preview Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="Preview" id="modalImage" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        // Saat modal dibuka, ganti src gambar
        imageModal.addEventListener('show.bs.modal', function(event) {
            const trigger = event.relatedTarget;
            const imgSrc = trigger.getAttribute('data-img-src');
            modalImage.setAttribute('src', imgSrc);
        });
    });
</script>
<?php $this->endSection(); ?>