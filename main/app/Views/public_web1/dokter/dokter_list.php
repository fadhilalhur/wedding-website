<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>List Dokter</h3>
                    <p><a href="<?= base_url() ?>">Beranda /</a> List Dokter</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expert_doctors_area doctor_page">
    <div class="container">
        <div class="row">
            <?php foreach ($doctor as $dr): ?>
            <div class="col-md-6 col-lg-3">
                <div class="single_expert mb-40">
                    <div class="expert_thumb">
                        <img src="<?= base_url('uploads/doctor/' . esc($dr['photo'])) ?>" alt="<?= esc($dr['name']) ?>">
                    </div>
                    <div class="experts_name text-center">
                        <h3><?= esc($dr['name']); ?></h3>
                        <span><?= esc($dr['specialization']); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
