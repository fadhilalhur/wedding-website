<?php if (!empty($breadcam['gambar'])): ?>
    <div class="bradcam_area" 
         style="background: url('<?= base_url($breadcam['gambar']) ?>') no-repeat center center; 
                background-size: cover; padding: 80px 0;">
    </div>
<?php else: ?>
    <div class="bradcam_area" style="background-color: #ccc; padding: 80px 0;">
        
    </div>
<?php endif; ?>

<!-- Table Area -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-4 text-center">DAFTAR ASURANSI / PENJAMIN</h2>
                <?php if (empty($asuransi)): ?>
                    <p>Tidak ada data asuransi tersedia.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table id="asuransiTable" class="table table-bordered table-striped">
                            <thead style="background-color: #4e73df; color: white;">
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA ASURANSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asuransi as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']) ?></td>
                                        <td><?= esc(strtoupper($item['nama'])) ?></td>
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