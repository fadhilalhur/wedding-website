  <?php $this->extend('layouts/public_web_v2'); ?>
  <?php $this->section('content'); ?>
  <div class="business_expert_area">
      <div class="business_tabs_area">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <ul class="nav" id="myTab" role="tablist">
                          <?php foreach ($pelayanan_unggulan as $index => $item): ?>
                              <li class="nav-item">
                                  <a class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="tab-<?= $index ?>" data-toggle="tab" href="#content-<?= $index ?>" role="tab" aria-controls="content-<?= $index ?>" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                      <?= esc($item['title']) ?>
                                  </a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="border_bottom">
              <div class="tab-content" id="myTabContent">
                  <?php foreach ($pelayanan_unggulan as $index => $item): ?>
                      <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="content-<?= $index ?>" role="tabpanel" aria-labelledby="tab-<?= $index ?>">
                          <div class="row align-items-center">
                              <div class="col-xl-6 col-md-6">
                                  <div class="business_info">
                                      <div class="icon">
                                          <i class="flaticon-first-aid-kit"></i>
                                      </div>
                                      <h3><?= esc($item['title']) ?></h3>
                                      <p><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
                                  </div>
                              </div>
                              <div class="business_thumb">
                                  <img src="<?= base_url(ltrim($item['gambar'], '/')) ?>" alt="<?= esc($item['title']) ?>" style="width: 300px; height: 200px; object-fit: cover;">
                              </div>

                          </div>
                      </div>
                  <?php endforeach; ?>

              </div>
          </div>
      </div>
  </div>
  <?php $this->endSection(); ?>