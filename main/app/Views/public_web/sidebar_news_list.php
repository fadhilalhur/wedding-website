<ul class="list-group list-group-flush">
    <?php if (!empty($sidebar_news)) : ?>
        <?php foreach ($sidebar_news as $item): ?>
            <li class="list-group-item px-3 py-2" style="border:none;border-bottom:1px solid #f0f0f0;background:#f7f9fa;">
                <?php if ($item['id'] == $current_id): ?>
                    <span style="color:#217a7e;display:block;">
                        <?= esc($item['title']) ?>
                    </span>
                    <div style="font-size:0.92rem;color:#217a7e;">
                        <?= date('d M Y, H:i', strtotime($item['published_at'])) ?>
                    </div>
                <?php else: ?>
                    <a href="<?= base_url('news/' . $item['slug']) ?>" style="color:#b0b4b8;font-weight:400;text-decoration:none;display:block;">
                        <?= esc($item['title']) ?>
                    </a>
                    <div style="font-size:0.92rem;color:#b0b4b8;">
                        <?= date('d M Y, H:i', strtotime($item['published_at'])) ?>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="list-group-item text-muted px-3 py-2">Tidak ada berita ditemukan.</li>
    <?php endif; ?>
</ul>

<div class="card-footer bg-transparent py-2">
    <?= $pager->links('berita_ajax', 'default') ?>
</div>
