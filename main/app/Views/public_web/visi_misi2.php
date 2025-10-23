<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>

<style>
    #visi-misi .section-title h2 {
        font-size: 2.4rem;
        font-weight: 900;
        color: #217a7e;
        letter-spacing: -1px;
        margin-bottom: 2.2rem;
        text-align: center;
    }
    .visi-misi-cards {
        display: flex;
        gap: 32px;
        justify-content: center;
        align-items: stretch;
        flex-wrap: wrap;
    }
    .visi-misi-card {
        background: #f7f9fa;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(33,122,126,0.08);
        padding: 2.2rem 2rem 2rem 2rem;
        min-width: 320px;
        max-width: 480px;
        flex: 1 1 340px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 0;
        border: none;
    }
    .visi-misi-card h4 {
        font-size: 1.45rem;
        font-weight: 800;
        color: #217a7e;
        margin-bottom: 1.2rem;
        letter-spacing: -0.5px;
    }
    .visi-misi-card ul {
        padding-left: 1.2rem;
        margin-bottom: 0;
        width: 100%;
    }
    .visi-misi-card li {
        font-size: 1.13rem;
        color: #2a2536;
        background: transparent;
        border: none !important;
        margin-bottom: 0.7rem;
        padding-left: 0;
        position: relative;
        padding-left: 1.5rem;
    }
    .visi-misi-card li:before {
        content: "•";
        color: #2bb6a8;
        font-size: 1.3rem;
        position: absolute;
        left: 0;
        top: 0;
        line-height: 1.1;
    }
    .visi-misi-card em {
        color: #b0b4b8;
        font-size: 1.08rem;
    }
    @media (max-width: 991.98px) {
        .visi-misi-cards {
            flex-direction: column;
            gap: 18px;
        }
        .visi-misi-card {
            max-width: 100%;
            min-width: 0;
        }
    }
</style>

<section id="visi-misi" class="visi-misi section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Visi &amp; Misi</h2>
    </div>
    <div data-aos="fade-up" data-aos-delay="100">
        <div class="visi-misi-cards">
            <div class="visi-misi-card">
                <h4>Visi</h4>
                <ul class="list-unstyled">
                    <?php if (!empty($companyVisiMisi) && is_array($companyVisiMisi)): ?>
                        <?php foreach ($companyVisiMisi as $item): ?>
                            <?php if (!empty($item['visi'])): ?>
                                <li><?= $item['visi'] ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><em>Visi perusahaan belum diatur.</em></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="visi-misi-card">
                <h4>Misi</h4>
                <ul class="list-unstyled">
                    <?php if (!empty($companyVisiMisi) && is_array($companyVisiMisi)): ?>
                        <?php foreach ($companyVisiMisi as $item): ?>
                            <?php if (!empty($item['misi'])): ?>
                                <li><?= $item['misi'] ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><em>Misi perusahaan belum diatur.</em></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>