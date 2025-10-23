<!-- Breadcrumb Area -->
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Asuransi</h3>
                    <p><a href="<?= base_url() ?>">Beranda /</a> Asuransi</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Area -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-4 text-center">Mitra & Asuransi</h2>
                <?php if (empty($asuransi)): ?>
                    <p>Tidak ada data asuransi tersedia.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table id="asuransiTable" class="table table-bordered table-striped">
                            <thead style="background-color: #4e73df; color: white;">
                                <tr>
                                    <th>#</th>
                                    <th>Mitra dan Asuransi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asuransi as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']) ?></td>
                                        <td><?= esc($item['nama']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#asuransiTable').DataTable({
            "pageLength": 10,
            "responsive": true,
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>