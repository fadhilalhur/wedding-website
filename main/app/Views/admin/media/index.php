<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>
<h4>Daftar Media</h4>
<div class="row">
    <div class="col-auto justify-content-start">
        <a href="<?= base_url('admin/media/create') ?>" class="btn btn-sm btn-primary mb-2">Tambah Media</a>
    </div>
</div>
<div class="row" id="mediaCards">
    <?php $idx=0; foreach ($media as $item): ?>
    <div class="col-6 col-sm-4 col-md-2 mb-3">
        <div class="card h-100">
            <?php $ext = strtolower(pathinfo($item['file_path'], PATHINFO_EXTENSION)); ?>
            <?php if (in_array($ext, ['jpg','jpeg','png','gif','webp'])): ?>
                <div class="card-body position-relative mb-0 p-0" style="height:150px;">
                    <img src="<?= base_url('assets/'.$item['file_path']) ?>" class="w-100 h-100 preview-img" style="object-fit:cover;cursor:pointer;" data-index="<?= $idx ?>" data-path="<?= esc($item['file_path']) ?>" alt="<?= esc($item['file_name']) ?>">
                    <div class="position-absolute top-0 end-0 dropdown m-1">
                        <button class="btn btn-sm btn-light p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-grip-horizontal"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item copy-btn" href="#" data-path="<?= base_url('assets/').esc($item['file_path']) ?>">Copy path</a></li>
                            <li><a class="dropdown-item delete-btn text-danger" href="#" data-href="<?= base_url('admin/media/delete/' . $item['id']) ?>">Delete</a></li>
                        </ul>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white px-1 small text-truncate">
                        <?= esc($item['file_name']) ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="card-body position-relative mb-0 p-0 bg-light d-flex align-items-center justify-content-center" style="height:150px;">
                    <i class="bi bi-file-earmark-text" style="font-size:48px;"></i>
                    <div class="position-absolute top-0 end-0 dropdown m-1">
                        <button class="btn btn-sm btn-light p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-grip-horizontal"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item copy-btn" href="#" data-path="<?= base_url('assets/').esc($item['file_path']) ?>">Copy path</a></li>
                            <li><a class="dropdown-item delete-btn text-danger" href="#" data-href="<?= base_url('admin/media/delete/' . $item['id']) ?>">Delete</a></li>
                        </ul>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white px-1 small text-truncate">
                        <?= esc($item['file_name']) ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $idx++; ?>
<?php endforeach; ?><?php unset($loop_index);?>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0 position-relative">
        <button type="button" class="btn btn-light position-absolute top-50 start-0 translate-middle-y prev-img" style="z-index:5;">&lt;</button>
        <button type="button" class="btn btn-light position-absolute top-50 end-0 translate-middle-y next-img" style="z-index:5;">&gt;</button>
        <button type="button" class="btn btn-secondary position-absolute top-0 end-0 m-2 copy-preview">Copy</button>
        <img src="" id="previewImg" class="img-fluid w-100" alt="preview">
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images=Array.from(document.querySelectorAll('.preview-img'));
        let currentIndex=0;
        function openModal(index){
            currentIndex=index;
            const src=images[currentIndex].getAttribute('src');
            document.getElementById('previewImg').setAttribute('src',src);
            const modalInstance=new bootstrap.Modal(document.getElementById('previewModal'));
            modalInstance.show();
        }
        // preview handler
        document.querySelectorAll('.preview-img').forEach(function(img){
            img.addEventListener('click',function(){
                openModal(parseInt(this.getAttribute('data-index')));
            });
        });
        // navigation buttons
        const prevBtn=document.querySelector('.prev-img');
        const nextBtn=document.querySelector('.next-img');
        const copyPreview=document.querySelector('.copy-preview');
        prevBtn.addEventListener('click',function(){
            currentIndex=(currentIndex-1+images.length)%images.length;
            document.getElementById('previewImg').src=images[currentIndex].src;
        });
        nextBtn.addEventListener('click',function(){
            currentIndex=(currentIndex+1)%images.length;
            document.getElementById('previewImg').src=images[currentIndex].src;
        });
        copyPreview.addEventListener('click',function(){
            const path=images[currentIndex].getAttribute('data-path');
            navigator.clipboard.writeText(path).then(() => alert('Path disalin ke clipboard')).catch(() => alert('Gagal menyalin'));
        });

        // delete with SweetAlert
        document.querySelectorAll('.delete-btn').forEach(function(btn){
            btn.addEventListener('click',function(e){
                e.preventDefault();
                const href=this.getAttribute('data-href');
                Swal.fire({
                    title:'Hapus media?',
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonText:'Ya, hapus',
                    cancelButtonText:'Batal'
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location.href=href;
                    }
                });
            });
        });

        document.querySelectorAll('.copy-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const path = this.getAttribute('data-path');
                navigator.clipboard.writeText(path).then(() => {
                    alert('Path disalin ke clipboard');
                }).catch(() => alert('Gagal menyalin'));
            });
        });
    });
</script>
<?php $this->endSection(); ?>
