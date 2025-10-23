<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="alert alert-primary shadow-sm mb-4">
            <h4 class="mb-1">Selamat Datang, <b><?= esc(session('username')) ?></b>!</h4>
            <div>Anda login sebagai <span class="badge bg-success text-uppercase">Admin</span>.</div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <span class="bg-primary text-white rounded-circle p-3"><i class="ti ti-news fs-3"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Total Berita</h5>
                    <h3 class="mb-0"><?= esc($total_berita) ?></h3>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <span class="bg-info text-white rounded-circle p-3"><i class="ti ti-user fs-3"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Total Dokter</h5>
                    <h3 class="mb-0"><?= esc($total_dokter) ?></h3>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <span class="bg-warning text-white rounded-circle p-3"><i class="ti ti-calendar fs-3"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Jadwal Aktif</h5>
                    <h3 class="mb-0"><?= esc($jadwal_aktif) ?></h3>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="card-title mb-3"><i class="ti ti-dashboard"></i> Menu Admin</h5>
                <div class="row g-3">
                    <?php foreach ($menus as $menu): ?>
                        <?php if ($menu['type'] === 'item'): ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="<?= base_url($menu['url']) ?>" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-3">
                                    <i class="<?= esc($menu['icon'] ?? 'ti ti-circle') ?> fs-4 me-2"></i>
                                    <span><?= esc($menu['title']) ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>