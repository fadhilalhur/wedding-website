<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>
<style>
    .news-slider-row {
        scroll-behavior: smooth;
        transition: scroll-left 0.3s;
    }

    @media (min-width: 1200px) {
        .news-card {
            min-width: 280px !important;
            max-width: 320px !important;
        }

        .news-slider-row {
            gap: 32px !important;
        }
    }

    @media (max-width: 1199px) {
        .news-card {
            min-width: 220px !important;
            max-width: 270px !important;
        }
    }

    .slider-arrow {
        width: 48px;
        height: 48px;
        background: #f4f6f8;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        transition: background 0.2s;
        font-size: 1.7rem;
    }

    .slider-arrow svg {
        transition: color 0.2s;
    }

    .slider-arrow:hover,
    .slider-arrow:focus {
        background: #e6f4f3;
    }

    .slider-arrow:hover svg,
    .slider-arrow:focus svg {
        color: #0a58ca !important;
        stroke: #0a58ca !important;
    }

    .slider-arrow:active {
        background: #e0eaea;
    }
   .news-heading {
    font-size: 2.1rem;
    font-weight: 900;
    color: #0a58ca; /* Biru */
    letter-spacing: -1px;
}

.news-subheading {
    font-size: 1rem;
    font-weight: 400;
    color: #6a6d81;
}

.news-see-all {
    text-decoration: none;
    font-size: 1rem;
    font-weight: 900;
    color: #0a58ca; /* Biru */
}

.news-arrow-icon {
    width: 26px;
    height: 26px;
}

.arrow-icon {
    width: 32px;
    height: 32px;
    color: #0a58ca; /* Biru */
}

.rotate-180 {
    transform: rotate(180deg);
}

.news-content-wrapper {
    padding-left: 1rem;
    padding-right: 1rem;
}

.news-card {
    min-width: 280px;
    max-width: 320px;
    border-radius: 18px;
}

.news-image {
    height: 180px;
    object-fit: cover;
    border-top-left-radius: 18px;
    border-top-right-radius: 18px;
}

.news-card-body {
    padding: 1.2rem;
}

.news-title {
    font-size: 1.1rem;
    font-weight: 900;
    color: #0a58ca; /* Ubah jadi biru */
    margin-bottom: 1rem;
}

.news-excerpt {
    color: #6a6d81;
    font-size: 0.98rem;
    margin-bottom: 1rem;
}

.news-readmore {
    color: #0a58ca;
    font-weight: 900;
    font-size: 0.92rem;
    text-decoration: none;
    display: flex;
    align-items: center;
}

.news-readmore-icon {
    width: 16px;
    height: 16px;
    margin-left: 6px;
    vertical-align: middle;
}

.news-date {
    font-size: 0.90rem;
}

.slider-arrow {
    width: 48px;
    height: 48px;
    background: #f4f6f8;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
    transition: background 0.2s;
    font-size: 1.7rem;
}

.slider-arrow svg {
    transition: color 0.2s;
}

.slider-arrow:hover,
.slider-arrow:focus {
    background: #e6efff; /* Biru muda */
}

.slider-arrow:hover svg,
.slider-arrow:focus svg {
    color: #0a58ca !important;
    stroke: #0a58ca !important;
}

.slider-arrow:active {
    background: #d9e6f2;
}

/* Responsive enhancement */
@media (min-width: 1200px) {
    .news-card {
        min-width: 300px !important;
        max-width: 340px !important;
    }

    .news-slider-row {
        gap: 32px !important;
    }
}


</style>
<section id="news" class="news section" style="background:#fafbfc;">
    <div class="container">
        <div class="news-header d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
            <div>
                <h2 class="news-heading">Berita Terbaru</h2>
                <p class="news-subheading">Telusuri berbagai informasi dan berita terbaru dari kami.</p>
            </div>
            <a href="<?= base_url('news') ?>" class="news-see-all d-flex align-items-center mt-3 mt-md-0">
                <span>Lihat Semua Berita</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-2 news-arrow-icon" viewBox="0 0 24 24">
                    <path stroke="#130F26" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.75 11.726h-15M13.7 5.701l6.05 6.024-6.05 6.025" />
                </svg>
            </a>
        </div>

        <div class="position-relative">
            <div class="d-flex align-items-center mb-4 gap-3">
                <button class="slider-arrow me-2" id="news-arrow-left" aria-label="Sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon rotate-180" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.75 11.726h-15M13.7 5.701l6.05 6.024-6.05 6.025" />
                    </svg>
                </button>

                <div class="news-content-wrapper flex-grow-1 position-relative overflow-hidden">
                    <div class="row flex-nowrap overflow-auto pb-3 news-slider-row" id="news-slider">
                        <?php if (!empty($news) && is_array($news)): ?>
                            <?php foreach ($news as $item): ?>
                                <div class="news-card flex-shrink-0">
                                    <div class="card h-100 shadow-sm border-0">
                                        <?php if (!empty($item['featured_image'])): ?>
                                            <img src="<?= base_url(ltrim($item['featured_image'], '/')) ?>" class="card-img-top news-image" alt="<?= esc($item['title']) ?>">
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column news-card-body">
                                            <a href="<?= base_url('news/' . $item['slug']) ?>" class="stretched-link text-decoration-none">
                                                <h3 class="news-title"><?= esc($item['title']) ?></h3>
                                            </a>
                                            <p class="news-excerpt"><?= mb_strimwidth(strip_tags($item['content']), 0, 80, '...') ?></p>
                                            <div class="mt-auto d-flex align-items-center justify-content-between">
                                                <a href="<?= base_url('news/' . $item['slug']) ?>" class="news-readmore">
                                                    Baca Selengkapnya
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="news-readmore-icon" viewBox="0 0 24 24">
                                                        <path stroke="#0a58ca" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.75 11.726h-15M13.7 5.701l6.05 6.024-6.05 6.025" />
                                                    </svg>
                                                </a>
                                                <small class="text-muted news-date"><?= date('d M Y', strtotime($item['published_at'])) ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <p class="text-center"><em>Belum ada berita.</em></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <button class="slider-arrow ms-2" id="news-arrow-right" aria-label="Berikutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.75 11.726h-15M13.7 5.701l6.05 6.024-6.05 6.025" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</section>
<script>
    // Simple slider scroll by button
    const slider = document.getElementById('news-slider');
    const leftBtn = document.getElementById('news-arrow-left');
    const rightBtn = document.getElementById('news-arrow-right');

    function scrollSlider(direction) {
        const card = slider.querySelector('.news-card');
        if (!card) return;
        const scrollAmount = card.offsetWidth + 24; // 24px gap
        slider.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
    leftBtn.addEventListener('mouseenter', () => leftBtn.querySelector('svg').style.color = '#0a58ca');
    leftBtn.addEventListener('mouseleave', () => leftBtn.querySelector('svg').style.color = '#130F26');
    rightBtn.addEventListener('mouseenter', () => rightBtn.querySelector('svg').style.color = '#0a58ca');
    rightBtn.addEventListener('mouseleave', () => rightBtn.querySelector('svg').style.color = '#130F26');
    leftBtn.addEventListener('click', () => scrollSlider(-1));
    rightBtn.addEventListener('click', () => scrollSlider(1));
</script>
<?= $this->endSection(); ?>