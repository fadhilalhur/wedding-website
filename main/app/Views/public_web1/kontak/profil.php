    <?php if (!empty($breadcam['gambar'])): ?>
        <div class="bradcam_area" 
            style="background: url('<?= base_url($breadcam['gambar']) ?>') no-repeat center center; 
                    background-size: cover; padding: 80px 0;">
        </div>
    <?php else: ?>
        <div class="bradcam_area" style="background-color: #ccc; padding: 80px 0;">
            
        </div>
    <?php endif; ?>

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="<?= $profil['gambar'] ?>" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Profil</h2>
                        <h3><?= ($profil['title']) ?><br></h3>
                        <p style="text-align: justify;"><?= $profil['content'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->