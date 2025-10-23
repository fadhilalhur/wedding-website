<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Docmed</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/public/assets_v2/css/style.css">

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php
    // Pisahkan menu utama dan submenu
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

    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="social_media_links">
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@docmed.com</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i> 160160</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="<?= base_url('/') ?>">
                                    <img src="<?= base_url('assets/public/assets_v2/img/logo.png') ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <?php foreach ($mainMenus as $menu): ?>
                                            <?php if (isset($subMenus[$menu['id']])): ?>
                                                <li>
                                                    <a href="<?= base_url($menu['url']) ?>">
                                                        <?= esc($menu['title']) ?> <i class="ti-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <?php foreach ($subMenus[$menu['id']] as $submenu): ?>
                                                            <li><a href="<?= base_url($submenu['url']) ?>"><?= esc($submenu['title']) ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="<?= base_url($menu['url']) ?>"><?= esc($menu['title']) ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Make an Appointment</a>
                                </div>
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

    <!-- header-end -->
    <?= $this->renderSection('content') ?>


    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/footer_logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                Firmament morning sixth subdue darkness
                                creeping gathered divide.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Departments
                            </h3>
                            <ul>
                                <li><a href="#">Eye Care</a></li>
                                <li><a href="#">Skin Care</a></li>
                                <li><a href="#">Pathology</a></li>
                                <li><a href="#">Medicine</a></li>
                                <li><a href="#">Dental</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Useful Links
                            </h3>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Contact</a></li>
                                <li><a href="#"> Appointment</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Address
                            </h3>
                            <p>
                                200, D-block, Green lane USA <br>
                                +10 367 467 8934 <br>
                                docmed@contact.com
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
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->
    <!-- link that opens popup -->

    <!-- form itself end-->
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
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- JS here -->
    <script src="<?= base_url() ?>assets/public/assets_v2/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/ajax-form.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/scrollIt.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/nice-select.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/gijgo.min.js"></script>

    <!-- Contact js -->
    <script src="<?= base_url() ?>assets/public/assets_v2/js/contact.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.form.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets_v2/js/mail-script.js"></script>

    <script src="<?= base_url() ?>assets/public/assets_v2/js/main.js"></script>

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
            $('.js-example-basic-multiple').select2();
        });
    </script>
</body>

</html>