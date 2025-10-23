<!-- Google Fonts Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f6fa;
        color: #2d3748;
    }

    .search-container {
        padding: 15px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin: 0 auto 20px;
        max-width: 80%;
    }

    .search-container .form-control,
    .search-container .select2-container .select2-selection {
        border: none;
        padding: 8px;
        font-size: 14px;
        border-radius: 5px;
        outline: none;
    }

    .search-container .select2-container .select2-selection--single,
    .search-container .select2-container .select2-selection--multiple {
        min-height: 34px;
    }

    .search-container button {
        background-color: #0649c7;
        border: none;
        padding: 8px 15px;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        min-width: 90px;
    }

    .search-container button:hover {
        background-color: #0056b3;
    }

    .content {
        padding: 20px;
        text-align: center;
        overflow: hidden;
    }

    .content h2 {
        color: #2d3748;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .content p {
        color: #718096;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .doctor-card {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        margin: 0 auto 20px;
        width: 90%;
        display: block;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .doctor-card img {
        width: 180px;
        height: 225px;
        border-radius: 10px;
        margin: 0 auto 15px;
        display: block;
    }

    .doctor-card .details {
        overflow: hidden;
        text-align: left;
        margin-top: 15px;
    }

    .doctor-card h3 {
        color: #2d3748;
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 10px 0;
    }

    .doctor-card .specialty {
        background-color: #0649c7;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;
        display: inline-block;
        margin-bottom: 10px;
    }

    .doctor-card .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        table-layout: fixed;
    }

    .doctor-card .schedule-table th {
        background-color: #0649c7;
        color: white;
        font-weight: 600;
        padding: 8px;
        text-align: center;
        border: 1px solid #f3f8ff;
    }

    .doctor-card .schedule-table td {
        background-color: #f3f8ff;
        color: #2d3748;
        padding: 8px;
        text-align: center;
        border: 1px solid #f3f8ff;
        min-width: 80px;
    }

    .doctor-card .profile-btn {
        background-color: #0649c7;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        position: absolute;
        bottom: 20px;
        right: 20px;
        transition: background-color 0.3s;
    }

    .doctor-card .profile-btn:hover {
        background-color: #0056b3;
    }

    .schedule-details {
        display: none;
        margin-top: 10px;
        padding: 10px;
        background-color: #f7f7f7;
        border-radius: 5px;
    }

    @media (max-width: 768px) {
        .search-container {
            max-width: 100%;
        }

        .doctor-card {
            width: 100%;
        }

        .doctor-card img {
            float: none;
            margin-bottom: 15px;
        }

        .doctor-card .details {
            float: none;
            width: 100%;
        }

        .doctor-card .schedule-table {
            display: block;
            overflow-x: auto;
        }
    }

    @media (min-width: 769px) {
        .doctor-card img {
            float: left;
        }

        .doctor-card .details {
            float: left;
            width: calc(100% - 200px);
        }
    }
</style>

<!-- Breadcrumb -->
<?php if (!empty($breadcam['gambar'])): ?>
    <div class="bradcam_area" 
         style="background: url('<?= base_url($breadcam['gambar']) ?>') no-repeat center center; 
                background-size: cover; padding: 80px 0;">
    </div>
<?php else: ?>
    <div class="bradcam_area" style="background-color: #ccc; padding: 80px 0;">
        ss
    </div>
<?php endif; ?>

<!-- Search & Content -->
<section class="section mt-4">
    <div class="container-fluid">
        <div class="search-container">
            <div class="row g-2 align-items-center">
                <div class="col-12 mb-3">
                    <label for="doctorSearch" class="form-label">Cari Nama Dokter:</label>
                    <input type="text" id="doctorSearch" class="form-control" placeholder="Cari nama dokter anda disini">
                </div>
                <div class="col-12 col-sm-12 col-lg-4 mb-3">
                    <label for="doctorSelect" class="form-label">Dokter:</label>
                    <select id="doctorSelect" class="form-select" style="width: 200px;">
                        <option value="">Pilih Dokter</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-lg-4 mb-3">
                    <label for="poliSelect" class="form-label">Poli:</label>
                    <select id="poliSelect" class="form-select" style="width: 200px;">
                        <option value="">Pilih Poli</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-lg-4 mb-3">
                    <label for="hariSelect" class="form-label">Hari:</label>
                    <select id="hariSelect" class="form-select" multiple="multiple" style="width: 300px;" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="col-auto ms-auto">
                    <label class="form-label">&nbsp;</label>
                    <button id="searchBtnHeader" class="btn">CARI</button>
                </div>
            </div>
        </div>

        <div class="content" id="doctorCardsContainer">
            <h2>Cari Jadwal Dokter di RS MITRA HUSADA</h2>
            <p>Untuk mencari dokter anda dapat memilih nama dokter atau mencari berdasarkan spesialis dan atau subspesialis</p>
        </div>
    </div>
</section>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            const baseUrl = ''; // Ganti dengan base URL sesuai server Anda (misalnya, 'http://localhost/your-app/')
            const $doctorCardsContainer = $('#doctorCardsContainer');

            // Inisialisasi Select2 untuk doctorSelect (single selection)
            $('#doctorSelect').select2({
                placeholder: "Pilih Dokter",
                allowClear: true,
                width: '100%'
            });

            // Inisialisasi Select2 untuk poliSelect (single selection)
            $('#poliSelect').select2({
                placeholder: "Pilih Poli",
                allowClear: true,
                width: '100%'
            });

            // Inisialisasi Select2 untuk hariSelect dengan minimal 1 pilihan
            $('#hariSelect').select2({
                placeholder: "Pilih Hari (Bisa pilih lebih dari satu)",
                allowClear: false,
                width: '100%'
            }).on('change', function() {
                if ($(this).val() === null || $(this).val().length === 0) {
                    // Memastikan minimal 1 pilihan dengan memilih hari pertama jika kosong
                    const defaultValue = $('option', this).first().val();
                    $(this).val(defaultValue).trigger('change.select2');
                }
            });

            // Muat opsi dokter dan poli dari server
            function loadFilterOptions() {
                $.get(baseUrl + 'get-jadwal-dokter', function(data) {
                    const doctors = [...new Set(data.map(item => item.nama_dokter))];
                    const polis = [...new Set(data.map(item => item.poli))];

                    $('#doctorSelect').empty().append('<option value="">Pilih Dokter</option>');
                    $('#poliSelect').empty().append('<option value="">Pilih Poli</option>');

                    doctors.forEach(d => {
                        $('#doctorSelect').append(`<option value="${d}">${d}</option>`);
                    });
                    polis.forEach(p => {
                        $('#poliSelect').append(`<option value="${p}">${p}</option>`);
                    });
                }).fail(function() {
                    console.error('Gagal memuat opsi filter.');
                });
            }

            loadFilterOptions();
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

            // Pencarian dari header
            $('#searchBtnHeader').click(function() {
                searchSchedules();
            });

            // Fungsi pencarian dengan integrasi doctorSearch
            function searchSchedules() {
                const namaDokterInput = $('#doctorSearch').val();
                const namaDokterSelect = $('#doctorSelect').val();
                const poliSelect = $('#poliSelect').val();
                const hari = $('#hariSelect').val() || ['Senin']; // Minimal 1 hari

                const params = new URLSearchParams();
                if (namaDokterInput) params.append('nama_dokter', namaDokterInput);
                if (namaDokterSelect) params.append('nama_dokter', namaDokterSelect);
                if (poliSelect) params.append('poli', poliSelect);
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
            }

            function renderDoctorCards(doctors) {
                $doctorCardsContainer.empty();
                if (doctors.length === 0 || (Array.isArray(doctors) && doctors.every(d => d.error))) {
                    $doctorCardsContainer.append('<p class="text-muted text-center py-4">Tidak ada dokter ditemukan.</p>');
                    return;
                }

                doctors.forEach(doctor => {
                    let photoPath = 'https://via.placeholder.com/180x225'; // Fallback
                    if (doctor.jadwal_details.length > 0 && doctor.jadwal_details[0].photo) {
                        photoPath = `uploads/doctor/${doctor.jadwal_details[0].photo}`;
                    }
                    const doctorCardHtml = `
                        <div class="doctor-card">
                            <img src="${photoPath}" alt="${escapeHtml(doctor.nama_dokter)}">
                            <div class="details ml-3">
                                <h3>${escapeHtml(doctor.nama_dokter)}</h3>
                                <span class="specialty">${escapeHtml(doctor.poli)}</span>
                                <table class="schedule-table">
                                    <thead>
                                        <tr>
                                            <th>Senin</th>
                                            <th>Selasa</th>
                                            <th>Rabu</th>
                                            <th>Kamis</th>
                                            <th>Jumat</th>
                                            <th>Sabtu</th>
                                            <th>Minggu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            ${['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'].map(day => {
                                                const schedule = doctor.jadwal_details.find(d => d.hari === day);
                                                return `<td class="time">${schedule ? `${escapeHtml(schedule.jam_mulai)} - ${escapeHtml(schedule.jam_selesai)}` : '-'}</td>`;
                                            }).join('')}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="schedule-details"></div>
                        </div>
                    `;
                    $doctorCardsContainer.append(doctorCardHtml);
                });
            }

            // Toggle detail jadwal
            $(document).on('click', '.profile-btn', function() {
                const $button = $(this);
                const $scheduleDetails = $button.closest('.doctor-card').find('.schedule-details');
                const doctorName = $button.data('doctor-name');
                let isOpen = $scheduleDetails.is(':visible');

                if (!isOpen) {
                    $button.text('Loading...');
                    $.ajax({
                        url: baseUrl + 'get-jadwal-dokter?mode=detail&doctorName=' + encodeURIComponent(doctorName),
                        method: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let scheduleHtml = '';
                            if (response.length > 0) {
                                const dailySchedules = {};
                                const hariOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                response.forEach(j => {
                                    if (!dailySchedules[j.hari]) dailySchedules[j.hari] = [];
                                    dailySchedules[j.hari].push(`${escapeHtml(j.jam_mulai)} - ${escapeHtml(j.jam_selesai)}`);
                                });
                                scheduleHtml = `
                                    <table class="table table-borderless text-secondary text-center align-middle mb-0">
                                        <thead>
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
                                `;
                            } else {
                                scheduleHtml = '<p class="text-muted text-center mb-0">Tidak ada jadwal tersedia untuk dokter ini.</p>';
                            }
                            $scheduleDetails.html(scheduleHtml).slideDown();
                            $button.text('Tutup Jadwal');
                        },
                        error: function() {
                            $scheduleDetails.html('<p class="text-danger">Gagal memuat jadwal.</p>').slideDown();
                            $button.text('LIHAT PROFIL');
                        },
                        complete: function() {
                            if (!isOpen) $button.text('Tutup Jadwal');
                        }
                    });
                } else {
                    $scheduleDetails.slideUp(function() {
                        $(this).empty();
                        $button.text('LIHAT PROFIL');
                    });
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
