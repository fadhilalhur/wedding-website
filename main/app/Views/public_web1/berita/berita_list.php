<!-- bradcam_area_start  -->
<div class="bradcam_area" 
    style="background: url('<?= base_url($breadcam['gambar'] ?: 'uploads/news/default_image.jpg') ?>') no-repeat center center; 
           background-size: cover; padding: 80px 0;">
</div>

<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach ($news as $item): ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" 
                                     src="<?= base_url($item['featured_image'] ?: 'uploads/news/default_image.jpg'); ?>" 
                                     alt="<?= esc($item['title']); ?>">

                                <a href="<?= base_url('berita/' . $item['slug']) ?>" class="blog_item_date">
                                    <?php
                                    $tgl = date('d', strtotime($item['published_at']));
                                    $bln = date('M', strtotime($item['published_at']));
                                    ?>
                                    <h3><?= $tgl ?></h3>
                                    <p><?= $bln ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('berita/' . $item['slug']) ?>">
                                    <h2><?= esc($item['title']) ?></h2>
                                </a>
                                <p><?= word_limiter(strip_tags($item['content']), 25) ?></p>
                                <ul class="blog-info-link">
                                    <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($item['published_at'])) ?></li>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <?= $pager->links() ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="get" action="<?= base_url('news') ?>">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" id="searchInput" class="form-control" name="q" placeholder="Cari Berita..." value="<?= esc($search ?? '') ?>">
                                    <div class="input-group-append">
                                        <button class="btn" id="searchBtn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <?php foreach ($recentPosts as $post): ?>
                            <div class="media post_item">
                                <img src="<?= base_url($post['featured_image'] ?: 'uploads/news/default_image.jpg'); ?>" 
                                     alt="<?= esc($post['title']); ?>" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                                <div class="media-body">
                                    <a href="<?= base_url('berita/' . $post['slug']) ?>">
                                        <h3><?= esc($post['title']) ?></h3>
                                    </a>
                                    <p><?= date('d M Y', strtotime($post['published_at'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
