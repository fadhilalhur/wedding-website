<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>
<section id="tabs" class="tabs section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Fasilitas Rumah Sakit</h2>
        <p>Berikut adalah fasilitas yang tersedia di RS Mitra Husada Pringsewu.</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <?php foreach ($fasilitas as $i => $item): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $i === 0 ? 'active show' : '' ?>" data-bs-toggle="tab" href="#fasilitas-tab-<?= $item['id'] ?>">
                                <?= esc($item['title']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    <?php foreach ($fasilitas as $i => $item): ?>
                        <div class="tab-pane <?= $i === 0 ? 'active show' : '' ?>" id="fasilitas-tab-<?= $item['id'] ?>">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3><?= esc($item['title']) ?></h3>
                                    <div style="text-align:justify"><?= $item['content'] ?></div>
                                </div>
                                <?php if (!empty($item['gambar'])): ?>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="<?= base_url($item['gambar']) ?>" alt="<?= esc($item['title']) ?>" class="img-fluid">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>