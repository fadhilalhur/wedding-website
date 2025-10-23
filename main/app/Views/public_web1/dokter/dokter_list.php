<?php if (!empty($breadcam['gambar'])): ?>
    <div class="bradcam_area" 
         style="background: url('<?= base_url($breadcam['gambar']) ?>') no-repeat center center; 
                background-size: cover; padding: 60px 0;">
    </div>
<?php else: ?>
    <div class="bradcam_area" style="background-color: #ccc; padding: 80px 0;">
        
    </div>
<?php endif; ?>
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
