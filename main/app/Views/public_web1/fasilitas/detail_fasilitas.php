<?php if (!empty($breadcam['gambar'])): ?>
    <div class="bradcam_area" 
         style="background: url('<?= base_url($breadcam['gambar']) ?>') no-repeat center center; 
                background-size: cover; padding: 80px 0;">
    </div>
<?php else: ?>
    <div class="bradcam_area" style="background-color: #ccc; padding: 80px 0;">
   
    </div>
<?php endif; ?>

<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img mb-4">
                        <img class="img-fluid" src="<?= base_url($fasilitas['gambar']); ?>" alt="<?= esc($fasilitas['title']); ?>">
                    </div>
                    <div class="blog_details">
                        <h2><?= esc($fasilitas['title']) ?></h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($fasilitas['created_at'])) ?></li>
                        </ul>
                        <?= $fasilitas['content'] ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="get" action="<?= base_url('fasilitas') ?>">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" id="searchInput" class="form-control" name="q" placeholder="Cari Fasilitas...">
                                    <div class="input-group-append">
                                        <button class="btn" id="searchBtn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Fasilitas Terbaru</h3>
                        <?php foreach ($recentFasilitas as $post): ?>
                            <div class="media post_item">
                                <img src="<?= base_url($post['gambar']); ?>" alt="<?= esc($post['title']); ?>" style="width: 60px; height: 60px; object-fit: cover;">
                                <div class="media-body">
                                    <a href="<?= base_url('pages/' . $post['slug']) ?>">
                                        <h3><?= esc($post['title']) ?></h3>
                                    </a>
                                    <p><?= date('d M Y', strtotime($post['created_at'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchBtn').on('click', function() {
            let keyword = $('#searchInput').val();

            $.ajax({
                url: "<?= base_url('fasilitas/ajaxSearch') ?>",
                method: "GET",
                data: {
                    q: keyword
                },
                success: function(response) {
                    $('#fasilitasList').html(response);
                },
                error: function(xhr) {
                    console.log("Terjadi kesalahan:", xhr.responseText);
                }
            });
        });
    });
</script>