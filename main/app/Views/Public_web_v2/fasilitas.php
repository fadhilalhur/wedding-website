  <?php $this->extend('layouts/public_web_v2'); ?>
  <?php $this->section('content'); ?>
  <div class="service_area ">
      <div class="container p-0">
          <div class="row no-gutters">
              <?php foreach ($fasilitas as $item): ?>
                  <div class="col-xl-4 col-md-4 d-flex">
                      <div class="single_service ">
                          <div class="icon">
                              <i class="flaticon-electrocardiogram"></i>
                          </div>
                          <h3><?= esc($item['title']) ?></h3>
                          <p><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
                          <a href="#" class="boxed-btn3-white">Detail Fasilitas</a>
                      </div>
                  </div>
              <?php endforeach; ?>
              
          </div>
      </div>
  </div>
  <?php $this->endSection(); ?>