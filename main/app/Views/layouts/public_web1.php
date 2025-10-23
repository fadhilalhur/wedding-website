<!doctype html>
<html class="no-js" lang="zxx">
<!-- production -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="facebook-domain-verification" content="8lrndccf4er8zqrve0nwi90c3jx8b9" />
    <title><?= $company['name'] ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>favicon.ico">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/public/template_1/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<style>
.slider_area {
    position: relative;
    width: 100%;
}

.single_slider {
    position: relative;
    width: 100%;
    height: 70vh !important;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 100% auto; /* skala lebarnya pas, tingginya otomatis */
}

.bradcam_area {
    position: relative;
    width: 100%;
    height: 70vh !important; /* tinggi sama */
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center center;
}

/* Tablet */
@media (max-width: 991px) {
    .bradcam_area {
        height: 40vh !important;
    }
}

/* HP */
@media (max-width: 575px) {
    .single_slider {
        height: 15vh !important; /* lebih tinggi supaya gambar tidak terjepit */
        background-size: 100% auto;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: #000; /* biar kalau ada sisa area tetap rapi */
    }
}

@media (max-width: 575px) {
    .bradcam_area {
        height: 30vh !important;
    }
}

/* Pagination & select2 (tetap) */
.blog-pagination {
    margin-top: 20px; /* lebih rapat */
}

select.select2-hidden-accessible {
    display: none !important;
}

.pagination {
    display: flex;
    list-style: none;
    padding-left: 0;
}

.pagination li {
    margin: 0 3px; /* lebih rapat */
}

.pagination li a,
.pagination li span {
    display: block;
    padding: 5px 10px; /* lebih kecil */
    color: #fff !important;
    background-color: #0649c7;
    border: 1px solid #0649c7;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s;
}

.pagination li a:hover,
.pagination li span:hover {
    background-color: #e11d23;
    border-color: #e11d23;
    color: #fff !important;
}

.pagination li.active span,
.pagination li.active a {
    background-color: #0649c7;
    border-color: #0649c7;
    color: #fff !important;
    cursor: default;
}

.pagination li.disabled span,
.pagination li.disabled a {
    color: #999 !important;
    cursor: not-allowed;
    background: #f9f9f9;
    border-color: #ddd;
}

</style>
<?php
$mainMenus = [];
$subMenus = [];

foreach ($menus as $menu) {
    if (empty($menu['parent_id'])) {
        $mainMenus[] = $menu;
    } else {
        $subMenus[$menu['parent_id']][] = $menu;
    }
}
?>
<body>
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i><?= $company['email'] ?></a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i><?= $company['phone'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo base_url() ?>">
                                    <img src="<?php echo base_url() ?>assets/public/template_1/img/logo-rsmh.png" width="100">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                              <nav>
                                  <ul id="navigation">
                                      <?php foreach ($mainMenus as $main) : ?>
                                          <?php
                                              $hasSub = isset($subMenus[$main['id']]);
                                              $url = !empty($main['url']) ? base_url($main['url']) : '#';
                                          ?>
                                          <li>
                                              <a href="<?= $url ?>">
                                                  <?= esc($main['title']) ?>
                                                  <?php if ($hasSub) : ?>
                                                      <i class="ti-angle-down"></i>
                                                  <?php endif; ?>
                                              </a>
                                              <?php if ($hasSub) : ?>
                                                  <ul class="submenu">
                                                      <?php foreach ($subMenus[$main['id']] as $sub) : ?>
                                                          <li>
                                                              <a href="<?= base_url($sub['url']) ?>">
                                                                  <?= esc($sub['title']) ?>
                                                              </a>
                                                          </li>
                                                      <?php endforeach; ?>
                                                  </ul>
                                              <?php endif; ?>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                              </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?= view($content); ?>
    <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="<?php echo base_url() ?>assets/public/template_1/img/logo-rsmh.png" alt="" style="width: 128px; height: 128px;">
                                    </a>
                                </div>
                                <p>
                                    <?= $company['tagline'] ?>
                                </p>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="<?= $company['sosmed_facebook'] ?>" target="_blank">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $company['sosmed_youtube'] ?>" target="_blank">
                                                <i class="ti ti-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $company['sosmed_ig'] ?>" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <!-- <h3 class="footer_title">
                                        Link Hub
                                </h3>
                                <ul>
                                    <li><a href="#">Eye Care</a></li>
                                    <li><a href="#">Skin Care</a></li>
                                    <li><a href="#">Pathology</a></li>
                                    <li><a href="#">Medicine</a></li>
                                    <li><a href="#">Dental</a></li>
                                </ul> -->

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Layanan Kami
                                </h3>
                                <ul>
                                    <li><a href="#">IGD</a></li>
                                    <li><a href="#">Rawat Jalan</a></li>
                                    <li><a href="#">Rawat Inap</a></li>
                                    <li><a href="#">Laboratorium</a></li>
                                    <li><a href="#">Radiologi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Alamat
                                </h3>
                                <p>
                                    <?= $company['address'] ?>
                                  <br>
                                    <?= $company['email'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Rights Reserved <i class="fa fa-heart-o" aria-hidden="true"></i> Powered <a href="https://mitrahusadapringsewu.com" target="_blank">IT RSMH</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Pick date">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department">Department</option>
                                <option value="1">Eye Care</option>
                                <option value="2">Physical Therapy</option>
                                <option value="3">Dental Care</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Doctors</option>
                                <option value="1">Mirazul Alom</option>
                                <option value="2">Monzul Alom</option>
                                <option value="3">Azizul Isalm</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email"  placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>

<script src="<?php echo base_url() ?>assets/public/template_1/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/ajax-form.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/scrollIt.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/nice-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/gijgo.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/contact.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.form.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/mail-script.js"></script>
    <script src="<?php echo base_url() ?>assets/public/template_1/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
        $(document).ready(function() {
    });
    </script>
</body>

</html>
