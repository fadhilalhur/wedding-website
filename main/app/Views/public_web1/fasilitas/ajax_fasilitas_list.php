<?php foreach ($fasilitas as $item): ?>
    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="<?= base_url($item['gambar']); ?>" alt="<?= esc($item['title']); ?>">
            <a href="<?= base_url('pages/' . $item['slug']) ?>" class="blog_item_date">
                <h3><?= date('d', strtotime($item['created_at'])) ?></h3>
                <p><?= date('M', strtotime($item['created_at'])) ?></p>
            </a>
        </div>
        <div class="blog_details">
            <a class="d-inline-block" href="<?= base_url('pages/' . $item['slug']) ?>">
                <h2><?= esc($item['title']) ?></h2>
            </a>
            <p><?= word_limiter(strip_tags($item['content']), 25) ?></p>
            <ul class="blog-info-link">
                <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($item['created_at'])) ?></li>
            </ul>
        </div>
    </article>
<?php endforeach; ?>
<?php if (count($fasilitas) == 0): ?>
    <p>Tidak ada fasilitas ditemukan.</p>
<?php endif; ?>
