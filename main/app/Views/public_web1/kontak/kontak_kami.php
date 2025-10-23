<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Kontak Kami</h3>
                    <p><a href="<?= base_url('/') ?>">Home /</a> Kontak Kami</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">

        <div class="row">
            <!-- Kolom Kontak dan Sosial Media -->


            <!-- Kolom Map -->
            <div class="col-lg-8">
                <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                    <iframe
                        src="<?= esc($company['maps_location']) ?>"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3><?= esc($company['name']) ?></h3>
                        <p><?= esc($company['address']) ?></p>
                    </div>
                </div>
                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><?= esc($company['phone']) ?></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><?= esc($company['email']) ?></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>

                <!-- Tambahan Media Sosial -->

                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-youtube"></i></span>
                    <div class="media-body">
                        <h3><a href="<?= esc($company['sosmed_youtube']) ?>" target="_blank">YouTube</a></h3>
                    </div>
                </div>
                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-music-alt"></i></span>
                    <div class="media-body">
                        <h3><a href="<?= esc($company['sosmed_tiktok']) ?>" target="_blank">TikTok</a></h3>
                    </div>
                </div>
                <div class="media contact-info mb-3">
                    <span class="contact-info__icon"><i class="ti-facebook"></i></span>
                    <div class="media-body">
                        <h3><a href="<?= esc($company['sosmed_facebook']) ?>" target="_blank">Facebook</a></h3>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>