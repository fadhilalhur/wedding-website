<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Jadwal Dokter</h3>
                    <p><a href="<?= base_url() ?>">Beranda /</a> Jadwal Dokter</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="row doctor-cards-container">
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form id="filterForm" onsubmit="return false;">
                            <div class="form-group mb-3">
                                <label for="doctorSelect" class="form-label">Nama Dokter</label>
                                <select class="form-select select2" id="doctorSelect" name="doctor">
                                    <option value="">Pilih Dokter</option>
                                </select>
                            </div>
                            <hr class="my-4">
                            <div class="form-group mb-3">
                                <label for="poliSelect" class="form-label">Spesialis / Poli</label>
                                <select class="form-select select2" id="poliSelect" name="poli">
                                    <option value="">Pilih Poli</option>
                                </select>
                            </div>
                            <hr class="my-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Hari Praktik</label>
                                <div id="hariCheckboxes">
                                    <?php foreach ($data['hari_options'] as $hari): ?>
                                        <div class="form-check">
                                            <input class="form-check-input hari-checkbox" type="checkbox" value="<?= $hari ?>" id="hari-<?= $hari ?>">
                                            <label class="form-check-label" for="hari-<?= $hari ?>"><?= $hari ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <button type="button" id="searchBtn" class="btn boxed-btn3-blue w-100 mt-3">Cari</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        const baseUrl = '<?= base_url() ?>';
        const $doctorCardsContainer = $('.doctor-cards-container');

        // Muat jadwal awal semua dokter
        loadInitialSchedules();

        function loadInitialSchedules() {
            $.ajax({
                url: baseUrl + 'get-jadwal-dokter',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    renderDoctorCards(response);
                },
                error: function() {
                    $doctorCardsContainer.html('<p class="text-danger">Gagal memuat jadwal awal.</p>');
                }
            });
        }

        function loadFilterOptions() {
            $.get(baseUrl + 'get-doctor-filter-options', function(data) {
                if (data.doctors && data.doctors.length > 0) {
                    data.doctors.forEach(d => {
                        $('#doctorSelect').append(`<option value="${d}">${d}</option>`);
                    });
                }
                if (data.poli && data.poli.length > 0) {
                    data.poli.forEach(p => {
                        $('#poliSelect').append(`<option value="${p}">${p}</option>`);
                    });
                }
                $('.select2').select2(); // inisialisasi ulang
            });
        }

        loadFilterOptions();

        $('#searchBtn').click(function() {
            const namaDokter = $('#doctorSelect').val();
            const poli = $('#poliSelect').val();
            const hari = $('.hari-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            const params = new URLSearchParams();
            if (namaDokter) params.append('nama_dokter', namaDokter);
            if (poli) params.append('poli', poli);
            if (hari.length > 0) {
                hari.forEach(h => params.append('hari[]', h));
            }

            $.ajax({
                url: baseUrl + 'get-jadwal-dokter?' + params.toString(),
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    renderDoctorCards(response);
                },
                error: function() {
                    $doctorCardsContainer.html('<p class="text-danger">Gagal mencari jadwal. Silakan coba lagi.</p>');
                }
            });
        });

        function renderDoctorCards(doctors) {
            $doctorCardsContainer.empty();
            if (doctors.length === 0) {
                $doctorCardsContainer.append('<p class="text-muted text-center py-4">Tidak ada dokter ditemukan.</p>');
                return;
            }

            doctors.forEach(doctor => {
                const photoPath = doctor.jadwal_details.length > 0 ? doctor.jadwal_details[0].photo : 'default.jpg'; // fallback jika kosong
                const doctorCardHtml = `
                <div class="col-md-12">
                    <div class="card border shadow-sm mb-4 custom-doctor-card">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3">
                                <img src="uploads/doctor/${photoPath}"
                                    alt="${escapeHtml(doctor.nama_dokter)}"
                                    class="me-3"
                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;"> <div>
                                    <h5 class="card-title mb-0 fw-bold">&nbsp ${escapeHtml(doctor.nama_dokter)}</h5> <p class="card-subtitle mb-1 text-muted small">&nbsp ${escapeHtml(doctor.poli)}</p> <div class="small-name text-muted" style="font-size: 0.85em;"></div> </div>
                            </div>
                            <div class="text-end pt-2 border-top">
                                <button type="button"
                                    class="btn boxed-btn3-blue toggle-schedule-btn"
                                    data-doctor-name="${escapeHtml(doctor.nama_dokter)}"
                                    data-status="closed">
                                    <i class="bi bi-calendar-plus me-1"></i> Lihat Jadwal
                                </button>
                            </div>
                        </div>
                        <div class="schedule-details mt-0 p-3 border-top bg-light" style="display:none;"></div> </div>
                </div>
                `;
                $doctorCardsContainer.append(doctorCardHtml);
            });
        }

        $doctorCardsContainer.on('click', '.toggle-schedule-btn', function() {
            const $button = $(this);
            const $scheduleDetails = $button.closest('.card').find('.schedule-details'); // Disesuaikan untuk menemukan schedule-details dalam kartu yang sama
            const doctorName = $button.data('doctor-name');
            let status = $button.data('status');

            if (status === 'closed') {
                $button.html('Tutup Jadwal <span class="spinner-border spinner-border-sm ms-1"></span>');
                $button.data('status', 'loading');

                const params = new URLSearchParams({
                    doctorName: doctorName,
                    mode: 'detail'
                });

                $.ajax({
                    url: baseUrl + 'get-jadwal-dokter?' + params.toString(),
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let scheduleHtml = '';

                        if (response.length > 0) {
                            const dailySchedules = {};
                            const hospitals = new Set(); // Untuk mengumpulkan nama spesialisasi unik untuk header
                            const hariOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                            response.forEach(j => {
                                if (!dailySchedules[j.hari]) dailySchedules[j.hari] = [];
                                dailySchedules[j.hari].push(`${escapeHtml(j.jam_mulai)} - ${escapeHtml(j.jam_selesai)}`);
                                if (j.specialization) hospitals.add(escapeHtml(j.specialization));
                            });

                            scheduleHtml += `
                            <div class="card bg-white border-0 shadow-sm p-3 small mt-3">
                                <div class="hospital-name mb-2">
                                    <h6 class="text-primary fw-semibold mb-1">
                                        Spesialis - ${hospitals.size ? Array.from(hospitals).join(', ') : 'Spesialisasi tersedia'}
                                    </h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless text-secondary text-center align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                ${hariOrder.map(day => `<th class="fs-6">${day}</th>`).join('')}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                ${hariOrder.map(day => `
                                                    <td class="fs-6">${(dailySchedules[day] || ['-']).join('<br>')}</td>
                                                `).join('')}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            `;
                        } else {
                            scheduleHtml = `<div class="card bg-white border-0 shadow-sm p-3"><p class="text-muted text-center mb-0">Tidak ada jadwal tersedia untuk dokter ini.</p></div>`;
                        }

                        $scheduleDetails.html(scheduleHtml).slideDown();
                        $button.text('Tutup Jadwal').data('status', 'open');
                    },
                    error: function() {
                        $scheduleDetails.html('<div class="alert alert-danger mb-0">Gagal memuat jadwal.</div>').slideDown();
                        $button.text('Lihat Jadwal').data('status', 'closed');
                    }
                });
            } else if (status === 'open') {
                $scheduleDetails.slideUp(function() {
                    $(this).empty(); // Hapus konten setelah disembunyikan
                });
                $button.text('Lihat Jadwal').data('status', 'closed');
            }
        });

        // Fungsi pembantu untuk mengamankan HTML
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) {
                return map[m];
            });
        }
    });
</script>