<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>

<style>
    @media (min-width: 992px) {
        .sticky-sidebar {
            position: sticky;
            top: 150px;
            z-index: 10;
        }
    }
</style>

<div class="container pt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-0 mb-4" style="--bs-breadcrumb-divider: '>';font-size:1.08rem;">
            <li class="breadcrumb-item">
                <a href="<?= base_url('/') ?>" style="color:#3b4a5a;font-weight:400;">Beranda</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('news') ?>" style="color:#3b4a5a;font-weight:400;">Berita</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page" style="color:#0a58ca;font-weight:400;">
                <?= esc($news['title']) ?>
            </li>
        </ol>
    </nav>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Sidebar Kiri -->
        <div class="col-lg-4 d-none d-lg-block sticky-sidebar">
            <div class="sticky-sidebar">
                <div class="card shadow-sm mb-4" style="border-radius:8px;background:#f7f9fa;">
                    <div class="card-header bg-white" style="font-weight:700;font-size:1.1rem;color:#0a58ca;border-top-left-radius:8px;border-top-right-radius:8px;background:#f7f9fa;border-bottom:none;">
                        Berita Lainnya
                    </div>

                    <?php
                    $db = db_connect();
                    $builder = $db->table('news');

                    $search = \Config\Services::request()->getGet('search');
                    if ($search) {
                        $builder->like('title', $search);
                    }

                    $builder->select('id, title, slug, published_at');
                    $builder->orderBy('published_at', 'DESC');

                    $perPage = 5;
                    $page = (int)(\Config\Services::request()->getGet('page') ?? 1);
                    $total = $builder->countAllResults(false);
                    $newsList = $builder->get($perPage, ($page - 1) * $perPage)->getResultArray();
                    $pager = \Config\Services::pager();
                    $paginationLinks = $pager->makeLinks($page, $perPage, $total, 'bootstrap');


                    ?>

                    <!-- Form Pencarian -->
                    <form method="get" class="px-3 pt-3  mb-3">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-9">
                                <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="<?= esc($search) ?>">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-sm btn-primary w-100" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>

                    <!-- Daftar Berita -->
                    <ul class="list-group list-group-flush">
                        <?php foreach ($newsList as $item): ?>
                            <li class="list-group-item px-3 py-2" style="border:none;border-bottom:1px solid #f0f0f0;background:#f7f9fa;">
                                <?php if ($item['id'] == $news['id']): ?>
                                    <span style="color:#0a58ca;display:block;">
                                        <?= esc($item['title']) ?>
                                    </span>
                                    <div style="font-size:0.92rem;color:#0a58ca;">
                                        <?= date('d M Y', strtotime($item['published_at'])) ?>
                                    </div>
                                <?php else: ?>
                                    <a href="<?= base_url('news/' . $item['slug']) ?>" style="color:#b0b4b8;font-weight:400;text-decoration:none;display:block;">
                                        <?= esc($item['title']) ?>
                                    </a>
                                    <div style="font-size:0.92rem;color:#b0b4b8;">
                                        <?= date('d M Y', strtotime($item['published_at'])) ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Navigasi Pagination -->
                    <div class="px-3 py-2">
                        <?= $paginationLinks ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-8">
            <h2 style="color:#0a58ca;font-weight:700;"><?= esc($news['title']) ?></h2>
            <p class="text-muted mb-2">
                <?= date('d M Y, H:i', strtotime($news['published_at'])) ?>
            </p>

            <?php if (!empty($news['featured_image'])): ?>
                <img src="<?= base_url(ltrim($news['featured_image'], '/')) ?>" class="img-fluid mb-4" alt="<?= esc($news['title']) ?>">
            <?php endif; ?>

            <div class="mb-4" style="text-align: justify;">
                <?= $news['content'] ?>
            </div>

            <?php if (!empty($news['meta_keywords'])): ?>
                <div class="mb-2">
                    <small class="text-muted">Tags: <?= esc($news['meta_keywords']) ?></small>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>