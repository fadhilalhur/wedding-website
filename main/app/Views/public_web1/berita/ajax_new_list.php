<?php foreach ($news as $item): ?>
    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="<?= base_url($item['featured_image']); ?>" alt="<?= esc($item['title']); ?>">
            <a href="<?= base_url('berita/' . $item['slug']) ?>" class="blog_item_date">
                <h3><?= date('d', strtotime($item['published_at'])) ?></h3>
                <p><?= date('M', strtotime($item['published_at'])) ?></p>
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
<?php if (count($news) === 0): ?>
    <p>Tidak ada berita ditemukan.</p>
<?php endif; ?>