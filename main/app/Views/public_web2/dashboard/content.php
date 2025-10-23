<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Health care</span> <br>
                                For Hole Family </h3>
                            <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                healthcare service provider to consistently.</p>
                            <a href="#" class="boxed-btn3">Check Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Health care</span> <br>
                                For Hole Family </h3>
                            <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                healthcare service provider to consistently.</p>
                            <a href="#" class="boxed-btn3">Check Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>Health care</span> <br>
                                For Hole Family </h3>
                            <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                healthcare service provider to consistently.</p>
                            <a href="#" class="boxed-btn3">Check Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_area">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-electrocardiogram"></i>
                    </div>
                    <h3>Hospitality</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">Apply For a Bed</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-emergency-call"></i>
                    </div>
                    <h3>Emergency Care</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">+10 672 356 3567</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-first-aid-kit"></i>
                    </div>
                    <h3>Chamber Service</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="our_department_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-55">
                    <h3>Posting Terbaru</h3>
                    <p>Menampilkan daftar data dan informasi tentang posting</p>
                </div>
            </div>
        </div>
        <div class="row">
          <?php foreach ($news as $row): ?>
            <div class="col-xl-4 col-md-6 col-lg-4">
              <div class="single_department">
                <div class="department_thumb">
                  <img src="<?= base_url($row['featured_image']); ?>" alt="<?= esc($row['title']); ?>">
                </div>
                <div class="department_content">
                  <h3>
                    <a href="<?= base_url('news/' . $row['slug']); ?>"><?= esc($row['title']); ?></a>
                  </h3>
                  <p><?= esc(word_limiter(strip_tags($row['content']), 5)); ?></p>
                  <span class="text-secondary small mb-3"><?= esc(tanggalIndo($row['published_at'])); ?></span>
                  <hr>
                  <a href="<?= base_url('news/' . $row['slug']); ?>" class="btn btn-block btn-primary">Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="testmonial_area">
    <div class="testmonial_active owl-carousel">
        <div class="single-testmonial testmonial_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_info text-center">
                            <div class="quote">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                            <div class="testmonial_author">
                                <h4>Asana Korim</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-testmonial testmonial_bg_2 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_info text-center">
                            <div class="quote">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                            <div class="testmonial_author">
                                <h4>Asana Korim</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-testmonial testmonial_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_info text-center">
                            <div class="quote">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                            <div class="testmonial_author">
                                <h4>Asana Korim</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="business_expert_area">
    <div class="business_tabs_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Excellent Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                        aria-selected="false">Qualified Doctors</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                        aria-selected="false">Emergency Departments</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Leading edge care for Your family</h3>
                                                <p>Esteem spirit temper too say adieus who direct esteem.
                                                    It esteems luckily picture placing drawing. Apartments frequently or motionless on
                                                    reasonable projecting expression.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="<?php echo base_url() ?>assets/public/template_1/img/about/business.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Leading edge care for Your family</h3>
                                                <p>Esteem spirit temper too say adieus who direct esteem.
                                                    It esteems luckily picture placing drawing. Apartments frequently or motionless on
                                                    reasonable projecting expression.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="<?php echo base_url() ?>assets/public/template_1/img/about/business.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_info">
                                                <div class="icon">
                                                    <i class="flaticon-first-aid-kit"></i>
                                                </div>
                                                <h3>Leading edge care for Your family</h3>
                                                <p>Esteem spirit temper too say adieus who direct esteem.
                                                    It esteems luckily picture placing drawing. Apartments frequently or motionless on
                                                    reasonable projecting expression.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="business_thumb">
                                                <img src="<?php echo base_url() ?>assets/public/template_1/img/about/business.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                        </div>
                      </div>
        </div>
    </div>
</div>

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
                          <img src="<?= base_url('assets/public/template_1/img/experts/' . esc($dr['photo'])) ?>" alt="<?= esc($dr['name']) ?>">
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

<div class="Emergency_contact">
    <div class="conatiner-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-6">
                <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                    <div class="info">
                        <h3>For Any Emergency Contact</h3>
                        <p>Esteem spirit temper too say adieus.</p>
                    </div>
                    <div class="info_button">
                        <a href="#" class="boxed-btn3-white">+10 378 4673 467</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                    <div class="info">
                        <h3>Make an Online Appointment</h3>
                        <p>Esteem spirit temper too say adieus.</p>
                    </div>
                    <div class="info_button">
                        <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
