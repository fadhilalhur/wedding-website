
<?= $this->extend('layouts/public_web'); ?>
<?= $this->section('content'); ?>

<style>
    .doctor-search-page {
        background: #fafbfc;
        min-height: 100vh;
        padding: 2.5rem 0;
    }
    .doctor-search-container {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 4px 32px rgba(33,122,126,0.08);
        padding: 2.5rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        gap: 2.5rem;
    }
    .doctor-search-sidebar {
        width: 320px;
        min-width: 260px;
        border-right: 1px solid #e0e0e0;
        padding-right: 2rem;
    }
    .doctor-search-main {
        flex: 1;
        min-width: 0;
    }
    .doctor-search-sidebar label,
    .doctor-search-sidebar h5 {
        font-weight: 700;
        color: #222;
        margin-bottom: 1rem;
        font-size: 1.15rem;
    }
    .doctor-search-sidebar .form-control,
    .doctor-search-sidebar .form-select {
        background: #f7f9fa;
        border-radius: 12px;
        border: 1.5px solid #e0e0e0;
        min-height: 44px;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }
    .doctor-search-sidebar .form-control:focus,
    .doctor-search-sidebar .form-select:focus {
        background: #e9ecef;
        border-color: #b0b4b8;
        box-shadow: none;
    }
    .doctor-search-sidebar .form-check {
        margin-bottom: 1rem;
    }
    .doctor-search-sidebar .form-check-label {
        font-size: 1rem;
        color: #222;
        margin-left: 0.5rem;
    }
    .doctor-search-sidebar hr {
        margin: 2rem 0 1.5rem 0;
        border-top: 1px solid #e0e0e0;
    }
    .doctor-search-main-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    .doctor-search-main-header h4 {
        font-size: 1.35rem;
        font-weight: 700;
        margin: 0;
    }
    .doctor-search-main-header .search-box {
        flex: 1;
        margin-left: 2rem;
        position: relative;
    }
    .doctor-search-main-header .search-box input {
        width: 100%;
        border-radius: 12px;
        border: 1.5px solid #e0e0e0;
        background: #f7f9fa;
        min-height: 44px;
        padding-left: 2.5rem;
        font-size: 1rem;
    }
    .doctor-search-main-header .search-box .bi-search {
        position: absolute;
        left: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        color: #b0b4b8;
        font-size: 1.2rem;
    }
    .doctor-card {
        background: #f7f9fa;
        border-radius: 18px;
        box-shadow: 0 2px 12px rgba(33,122,126,0.06);
        padding: 2rem 2.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        transition: box-shadow 0.2s;
    }
    .doctor-card:hover {
        box-shadow: 0 6px 24px rgba(33,122,126,0.13);
    }
    .doctor-photo {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        object-fit: cover;
        background: #e0e0e0;
    }
    .doctor-info {
        flex: 1;
        min-width: 0;
    }
    .doctor-info h5 {
        font-size: 1.18rem;
        font-weight: 800;
        margin-bottom: 0.2rem;
        color: #222;
    }
    .doctor-info .specialty {
        font-size: 1rem;
        color: #358888;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .doctor-info .status {
        font-size: 1rem;
        font-weight: 700;
        color: #2bb6a8;
        margin-bottom: 0.7rem;
        display: block;
    }
    .doctor-schedule {
        background: #fff;
        border-radius: 12px;
        border-left: 6px solid #2bb6a8;
        padding: 1.2rem 1.5rem;
        margin-top: 0.7rem;
        margin-bottom: 0.7rem;
        font-size: 0.98rem;
    }
    .doctor-schedule strong {
        color: #217a7e;
        font-size: 1.08rem;
    }
    .doctor-schedule table {
        width: 100%;
        margin-top: 0.5rem;
    }
    .doctor-schedule th, .doctor-schedule td {
        padding: 0.2rem 0.5rem;
        text-align: left;
        font-size: 0.97rem;
    }
    .doctor-action {
        align-self: flex-end;
    }
    .doctor-action .btn {
        border-radius: 8px;
        font-weight: 700;
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
        border: 2px solid #2bb6a8;
        color: #217a7e;
        background: #fff;
        transition: background 0.2s, color 0.2s;
    }
    .doctor-action .btn:hover {
        background: #2bb6a8;
        color: #fff;
    }
    @media (max-width: 991.98px) {
        .doctor-search-container {
            flex-direction: column;
            padding: 1.5rem 0.5rem;
        }
        .doctor-search-sidebar {
            width: 100%;
            min-width: 0;
            border-right: none;
            border-bottom: 1px solid #e0e0e0;
            padding-right: 0;
            padding-bottom: 2rem;
        }
    }
</style>

<div class="doctor-search-page">
    <div class="doctor-search-container">
        <!-- Sidebar Filter -->
        <div class="doctor-search-sidebar">
            <h5>Cari Dokter</h5>
            <div class="mb-3">
                <label for="filter-date" class="form-label">Pilih Hari</label>
                <select class="form-select" id="filter-date">
                    <option value="">Pilih Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label class="form-label">Rumah sakit</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rs-all" checked>
                    <label class="form-check-label" for="rs-all">Semua Rumah Sakit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rs1">
                    <label class="form-check-label" for="rs1">RS Pondok Indah - Pondok Indah</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rs2">
                    <label class="form-check-label" for="rs2">RS Pondok Indah - Puri Indah</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rs3">
                    <label class="form-check-label" for="rs3">RS Pondok Indah - Bintaro Jaya</label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <label class="form-label">Spesialisasi</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius:12px 0 0 12px;">
                        <i class="bi bi-search" style="color:#b0b4b8;"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Pilih Spesialisasi" style="border-radius:0 12px 12px 0;">
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="doctor-search-main">
            <div class="doctor-search-main-header">
                <h4><span id="doctor-count">585</span> Dokter Ditemukan</h4>
                <div class="search-box">
                    <input type="text" placeholder="Nama Dokter">
                    <i class="bi bi-search"></i>
                </div>
            </div>
            <!-- Doctor Card List -->
            <div>
                <!-- Doctor Card Example -->
                <div class="doctor-card">
                    <img src="<?= base_url('assets/public/assets/img/doctor-default.png') ?>" class="doctor-photo" alt="Foto Dokter">
                    <div class="doctor-info">
                        <h5>dummy</h5>
                        <div class="specialty">Spesialis Anak</div>
                        <span class="status text-success">Tutup Jadwal</span>
                        <div class="doctor-schedule">
                            <strong>RS Pondok Indah - Bintaro Jaya</strong>
                            <table>
                                <tr>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Sabtu</th>
                                </tr>
                                <tr>
                                    <td>09:00 - 15:00</td>
                                    <td>09:00 - 12:00<br>13:00 - 16:00</td>
                                    <td>09:00 - 12:00<br>13:00 - 16:00</td>
                                    <td>09:00 - 12:00<br>13:00 - 16:00</td>
                                    <td>09:00 - 13:00</td>
                                    <td>08:00 - 11:00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <a href="#" class="btn">Book Appointment <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <!-- Doctor Card Example 2 -->
                <div class="doctor-card">
                    <img src="<?= base_url('assets/public/assets/img/doctor-default.png') ?>" class="doctor-photo" alt="Foto Dokter">
                    <div class="doctor-info">
                        <h5>dr. A. Budi Marjono, Sp. O.G, Ph.D</h5>
                        <div class="specialty">Spesialis Obstetri dan Ginekologi</div>
                        <span class="status text-primary">Lihat Jadwal</span>
                    </div>
                    <div class="doctor-action">
                        <a href="#" class="btn">Book Appointment <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <!-- Tambahkan card dokter lain sesuai kebutuhan -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
