<?php
// Ambil data company dari database (bisa juga dari controller dan dikirim ke view)
$companyModel = new \App\Models\CompanyModel();
$company = $companyModel->first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= esc($company['name'] ?? 'Company') ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url($company['logo'] ?? 'assets/public/assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url($company['logo'] ?? 'assets/public/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url() ?>assets/public/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="d-none d-md-flex align-items-center">
                    <i class="bi bi-geo-alt me-1"></i>
                    <?= esc($company['address'] ?? '') ?>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-phone me-1"></i>
                    <?= esc($company['phone'] ?? '') ?>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-end">
                <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
                    <?php if (!empty($company['logo'])): ?>
                        <img src="<?= base_url($company['logo']) ?>" alt="<?= esc($company['name']) ?>" style="max-height:48px;">
                    <?php endif; ?>
                    <h1 class="sitename ms-2 mb-0" style="font-size:1.6rem;"><?= esc($company['name'] ?? 'Company') ?></h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <?php
                        $menuModel = new \App\Models\MenuModel();
                        $menus = $menuModel->where('menu_type', 'public')->where('type', 'item')->orderBy('position', 'asc')->findAll();

                        // Susun menu menjadi array parent-child
                        $menuTree = [];
                        foreach ($menus as $menu) {
                            if (empty($menu['parent_id'])) {
                                $menuTree[$menu['id']] = $menu;
                                $menuTree[$menu['id']]['children'] = [];
                            }
                        }
                        foreach ($menus as $menu) {
                            if (!empty($menu['parent_id']) && isset($menuTree[$menu['parent_id']])) {
                                $menuTree[$menu['parent_id']]['children'][] = $menu;
                            }
                        }

                        $currentUrl = current_url();

                        // Render menu
                        foreach ($menuTree as $menu):
                            $url = (strpos($menu['url'], '/') === 0) ? base_url(ltrim($menu['url'], '/')) : base_url($menu['url']);
                            $isActive = ($currentUrl == $url) ? 'active' : '';

                            // Jika punya children, tampilkan dropdown
                            if (!empty($menu['children'])):
                        ?>
                                <li class="dropdown <?= $isActive ?>">
                                    <a href="<?= esc($url) ?>" class="dropdown-toggle <?= $isActive ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= esc($menu['title']) ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($menu['children'] as $child):
                                            $childUrl = (strpos($child['url'], '/') === 0) ? base_url(ltrim($child['url'], '/')) : base_url($child['url']);
                                            $childActive = ($currentUrl == $childUrl) ? 'active' : '';
                                        ?>
                                            <li><a class="dropdown-item <?= $childActive ?>" href="<?= esc($childUrl) ?>"><?= esc($child['title']) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php
                            else:
                            ?>
                                <li><a href="<?= esc($url) ?>" class="<?= $isActive ?>"><?= esc($menu['title']) ?></a></li>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="cta-btn" href="https://rekrutmen.mitrahusadapringsewu.com/" target="_blank" rel="noopener">
                    Lowongan kerja
                </a>

            </div>
        </div>
    </header>

    <main class="main">
        <?= $this->renderSection('content') ?>
    </main>

    <footer id="footer" class="footer light-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                        <?php if (!empty($company['logo'])): ?>
                            <img src="<?= base_url($company['logo']) ?>" alt="<?= esc($company['name']) ?>" style="max-height:38px;">
                        <?php endif; ?>
                        <span class="sitename ms-2"><?= esc($company['name'] ?? 'Company') ?></span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p><?= esc($company['address'] ?? '') ?></p>
                        <p class="mt-3"><strong>Customer Care :</strong> <span><?= esc($company['phone'] ?? '') ?></span></p>
                        <?php if (!empty($company['maps_location'])): ?>
                            <p><a href="<?= esc($company['maps_location']) ?>" target="_blank" rel="noopener"><i class="bi bi-geo-alt"></i> Lihat di Google Maps</a></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                  <h4>Hub Me</h4>
                  <ul>
                    <li><a href="https://rekrutmen.mitrahusadapringsewu.com" target="_blank">Lowongan Kerja</a></li>
                    <!-- <li><a href="https://survey.mitrahusadapringsewu.com/dynamic_form/1" target="_blank">Survei Pelayanan Gizi</a></li>
                    <li><a href="https://survey.mitrahusadapringsewu.com/dynamic_form/4" target="_blank">Survei Kepuasan Pasien</a></li> -->
                  </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Sosial Media Link</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/rsmitra.husada.7/" target="_blank">Facebook</a></li>
                        <li><a href="https://www.youtube.com/@rs.mitrahusadapringsewu8646" target="_blank">Youtube</a></li>
                        <li><a href="https://www.instagram.com/rs.mitrahusada/" target="_blank">Instagram</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Lokasi</h4>
                    <ul>
                        <?php if (!empty($company['maps_location'])): ?>
                            <li><a href="<?= esc($company['maps_location']) ?>" target="_blank" rel="noopener">Google Maps</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p><strong class="px-1 sitename"><?= esc($company['name'] ?? 'Company') ?></strong>© <?= date('Y') ?></span> <span>Powered @ IT RSMH</span></p>

        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>assets/public/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>assets/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>assets/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>assets/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url() ?>assets/public/assets/js/main.js"></script>

</body>
