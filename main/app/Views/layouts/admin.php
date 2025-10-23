<!DOCTYPE html>
<html lang="id">
<!-- [Head] start -->

<script>
    var base_url = "<?= base_url() ?>";
</script>

<head>
    <title>Administrator</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style-preset.css">

    <!-- DataTables CSS -->
    <?= $this->renderSection('styles') ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin/libs/dropify/dist/css/dropify.min.css') ?>" rel="stylesheet">
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="<?= base_url() ?>dashboard/index.html" class="b-brand text-primary">
                    <!-- ========   Company Logo   ============ -->
                    <img src="<?= get_company_logo() ?>" class="img-fluid logo-lg" width="50px" alt="<?= get_company_name() ?>"><br>
                    <small><?= get_company_name() ?></small>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <?php
                    $menuModel = new \App\Models\MenuModel();
                    $menus = $menuModel->where('menu_type', 'admin')->orderBy('position', 'asc')->findAll();
                    if (count($menus) > 0):
                        foreach ($menus as $menu):
                            if ($menu['type'] === 'caption'): ?>
                                <li class="pc-item pc-caption">
                                    <label><?= esc($menu['title']) ?></label>
                                    <?php if (!empty($menu['icon'])): ?><i class="<?= esc($menu['icon']) ?>"></i><?php endif; ?>
                                </li>
                            <?php elseif ($menu['type'] === 'item'): ?>
                                <li class="pc-item">
                                    <a href="<?= base_url($menu['url']) ?>" class="pc-link">
                                        <span class="pc-micon"><i class="<?= esc($menu['icon'] ?? 'ti ti-circle') ?>"></i></span>
                                        <span class="pc-mtext"><?= esc($menu['title']) ?></span>
                                    </a>
                                </li>
                        <?php endif;
                        endforeach;
                    else: ?>
                        <li class="pc-item"><span class="pc-mtext">Tidak ada menu</span></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a
                            class="pc-head-link dropdown-toggle arrow-none m-0"
                            data-bs-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="false"
                            aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none" placeholder="Cari di sini. . .">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="header-search">
                            <i data-feather="search" class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Cari di sini. . .">
                        </form>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a
                            class="pc-head-link dropdown-toggle arrow-none me-0"
                            data-bs-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="false"
                            aria-expanded="false">
                            <i class="ti ti-mail"></i>
                        </a>
                        <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Pesan</h5>
                                <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
                                <div class="list-group list-group-flush w-100">
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= base_url() ?>assets/admin/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">3:00 AM</span>
                                                <p class="text-body mb-1">Hari ini adalah ulang tahun <b>Cristina Danny</b>.</p>
                                                <span class="text-muted">2 menit yang lalu</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= base_url() ?>assets/admin/images/user/avatar-1.jpg" alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">6:00 PM</span>
                                                <p class="text-body mb-1"><b>Aida Burg</b> mengomentari postingan Anda.</p>
                                                <span class="text-muted">5 Agustus</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= base_url() ?>assets/admin/images/user/avatar-3.jpg" alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">2:45 PM</span>
                                                <p class="text-body mb-1"><b>Terjadi kegagalan pada pengaturan Anda.</b></p>
                                                <span class="text-muted">7 jam yang lalu</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= base_url() ?>assets/admin/images/user/avatar-4.jpg" alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">9:10 PM</span>
                                                <p class="text-body mb-1"><b>Cristina Danny </b> mengundang Anda untuk bergabung dengan <b> Rapat.</b></p>
                                                <span class="text-muted">Waktu rapat scrum harian</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="text-center py-2">
                                <a href="#!" class="link-primary">Lihat semua</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a
                            class="pc-head-link dropdown-toggle arrow-none me-0"
                            data-bs-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="false"
                            data-bs-auto-close="outside"
                            aria-expanded="false">
                            <img src="<?= base_url() ?>assets/admin/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                            <span><?= session('username') ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="<?= base_url() ?>assets/admin/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1"><?= session('username') ?></h6>
                                        <span><?= session('role') ?></span>
                                    </div>
                                    <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
                                </div>
                            </div>
                            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link active"
                                        id="drp-t1"
                                        data-bs-toggle="tab"
                                        data-bs-target="#drp-tab-1"
                                        type="button"
                                        role="tab"
                                        aria-controls="drp-tab-1"
                                        aria-selected="true"><i class="ti ti-user"></i> Profil</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                                    <a href="<?= base_url('admin/users/edit/' . esc(session('user_id'))) ?>" class="dropdown-item">
                                        <i class="ti ti-edit-circle"></i>
                                        <span>Ubah Profil</span>
                                    </a>
                                    <a href="<?= base_url('admin/users/' . esc(session('user_id'))) ?>" class="dropdown-item">
                                        <i class="ti ti-user"></i>
                                        <span>Lihat Profil</span>
                                    </a>

                                    <a href="<?= base_url('admin/users/create') ?>" class="dropdown-item">
                                        <i class="ti ti-user-plus"></i>
                                        <span>Tambah Pengguna</span>
                                    </a>
                                    <a href="<?= base_url('logout') ?>" class="dropdown-item">
                                        <i class="ti ti-power"></i>
                                        <span>Keluar</span>
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-help"></i>
                                        <span>Bantuan</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-user"></i>
                                        <span>Pengaturan Akun</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-lock"></i>
                                        <span>Pusat Privasi</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-messages"></i>
                                        <span>Umpan Balik</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-list"></i>
                                        <span>Riwayat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Applicants</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item">Recruitment</li>
                                <li class="breadcrumb-item" aria-current="page">Applicants</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm my-1">
                    <p class="m-0">WebAdmin &#9829; ITRSMH </p>
                </div>
                <div class="col-auto my-1">
                    <ul class="list-inline footer-link mb-0">
                        <li class="list-inline-item"><a href="<?= base_url() ?>" target="_Blank">Lihat Website</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url() ?>assets/admin/js/plugins/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/pages/dashboard-default.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/plugins/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/plugins/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/fonts/custom-font.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/pcoded.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/plugins/feather.min.js"></script>

    <script>
        layout_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change("preset-1");
    </script>

    <script>
        font_change("Public-Sans");
    </script>

    <script>

    </script>

    <script>
        $(document).ready(function() {
            if ($('.datatable').length) {
                $('.datatable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-secondary'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-info'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-danger'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-primary'
                        }
                    ]
                });
            }
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>