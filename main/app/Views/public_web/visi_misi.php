<section id="visi-misi" class="visi-misi section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Visi &amp; Misi</h2>
        <p><?= esc($companyVisiMisi['tagline'] ?? '') ?></p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm h-100">
                                        
                    <div class="card-body">
                        <h4 class="card-title">Visi</h4>
                        <ul class="list-group list-group-flush">
                            <?php if (!empty($companyVisiMisi) && is_array($companyVisiMisi)): ?>
                                <?php foreach ($companyVisiMisi as $item): ?>
                                    <?php if (!empty($item['visi'])): ?>
                                        <li class="list-group-item border-0 ps-0">
                                            <?= $item['visi'] ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item border-0 ps-0">
                                    <em>Visi perusahaan belum diatur.</em>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title">Misi</h4>
                       <ul class="list-group list-group-flush">
                            <?php if (!empty($companyVisiMisi) && is_array($companyVisiMisi)): ?>
                                <?php foreach ($companyVisiMisi as $item): ?>
                                    <?php if (!empty($item['misi'])): ?>
                                        <li class="list-group-item border-0 ps-0">
                                            <?= $item['misi'] ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item border-0 ps-0">
                                    <em>misi perusahaan belum diatur.</em>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- /Visi Misi Section -->