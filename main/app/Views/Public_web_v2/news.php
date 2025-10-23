  <?php $this->extend('layouts/public_web_v2'); ?>
  <?php $this->section('content'); ?>
  <div class="our_department_area">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="section_title text-center mb-55">
                      <h3>Berita Terbaru</h3>
                      <p>Informasi terkini seputar layanan dan aktivitas kami.</p>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php foreach ($news as $item): ?>
                  <div class="col-xl-4 col-md-6 col-lg-4 mb-4 d-flex">
                      <div class="single_department w-100">
                          <div class="department_thumb">
                              <img src="<?= base_url(ltrim($item['featured_image'], '/')) ?>" alt="<?= esc($item['title']) ?>" >
                          </div>
                          <div class="department_content">
                              <h3><a href="<?= base_url('news/' . $item['slug']) ?>"><?= esc($item['title']) ?></a></h3>
                              <p><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
                              <a href="<?= base_url('news/' . $item['slug']) ?>" class="learn_more">Selengkapnya</a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
           
          </div>
      </div>
  </div>
  <?php $this->endSection(); ?>