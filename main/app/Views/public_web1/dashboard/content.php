<!-- Slider Area -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <?php foreach ($sliders as $slider) : ?>
            <div class="single_slider" style="background-image: url('<?= base_url(esc($slider['gambar'])) ?>')"></div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Service Area -->
<div class="service_area">
    <div class="container p-0">
        <div class="row no-gutters">
            <?php foreach ($fasilitas as $item): ?>
                <div class="col-xl-4 col-md-4 d-flex">
                    <div class="single_service">
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

<!-- Berita Terbaru -->
<div class="our_department_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-55">
                    <h3>Berita Terbaru</h3>
                    <p>Menampilkan daftar data dan informasi tentang berita terkini</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($news as $row): ?>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="<?= base_url($row['featured_image'] ?: 'uploads/news/default_image.jpg'); ?>" alt="<?= esc($row['title']); ?>">
                        </div>
                        <div class="department_content">
                            <h3>
                                <a href="<?= base_url('berita/' . $row['slug']); ?>"><?= esc($row['title']); ?></a>
                            </h3>
                            <p><?= esc(word_limiter(strip_tags($row['content']), 5)); ?></p>
                            <span class="text-secondary small mb-3"><?= esc(tanggalIndo($row['published_at'])); ?></span>
                            <hr>
                            <a href="<?= base_url('berita/' . $row['slug']); ?>" class="btn btn-block boxed-btn3-blue">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Expert Doctors Area -->
<div class="expert_doctors_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="doctors_title mb-55">
                    <h3>Dokter Kami</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="expert_active owl-carousel">
                    <?php foreach ($doctor as $dr): ?>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="<?= base_url('uploads/doctor/' . esc($dr['photo'])) ?>" alt="<?= esc($dr['name']) ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3><?= esc($dr['name']); ?></h3>
                                <span><?= esc($dr['specialization']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Emergency Contact -->
<div class="Emergency_contact">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-6">
                <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                    <div class="info">
                        <h3>Customer Service</h3>
                        <p>Layanan Darurat Hubungi Kami CS <?= esc($company['name']); ?></p>
                    </div>
                    <div class="info_button">
                        <a href="https://mitrahusadapringsewu.com" class="boxed-btn3-white"><?= esc($company['phone']); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                    <div class="info">
                        <h3>Daftar Online Melalui Mobile JKN</h3>
                        <p>Booking atau Pendaftaran online melalui aplikasi Mobile JKN</p>
                    </div>
                    <div class="info_button">
                        <a href="https://play.google.com/store/search?q=mobile%20jkn&c=apps" target="_blank" class="boxed-btn3-white">Unduh Disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
