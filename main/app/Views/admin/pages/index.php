<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar Halaman</h4>
<div class="row justify-content-start">
    <div class="col-auto">
        <a href="<?= base_url('admin/pages/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah Halaman</a>
    </div>
</div>

<table class="table datatable">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Slug</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $item): ?>
            <tr>
                <td>
                    <?php if (!empty($item['gambar'])): ?>
                        <img src="<?= base_url( $item['gambar']) ?>" alt="Gambar" style="width: 70px; height: 50px; object-fit: cover; border-radius: 6px;" onclick="showImageModal('<?= base_url('uploads/pages/' . $item['gambar']) ?>')" style="cursor:pointer;">
                    <?php else: ?>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>
                <td><?= esc($item['title']) ?></td>
                <td><?= esc($item['slug']) ?></td>
                <td>
                    <a href="<?= base_url('admin/pages/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/pages/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center p-0">
        <img src="" id="modalImage" class="img-fluid" alt="Preview">
      </div>
    </div>
  </div>
</div>

<script>
    function showImageModal(url) {
        const modalImg = document.getElementById('modalImage');
        modalImg.src = url;
        $('#imageModal').modal('show');
    }
</script>
<?php $this->endSection(); ?>
