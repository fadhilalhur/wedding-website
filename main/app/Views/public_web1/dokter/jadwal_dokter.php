<!-- BAGIAN HEADER -->
<div class="bradcam_area breadcam_bg_2">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <!--<h3>Jadwal Dokter</h3>-->
          <!--<p><a href="<?= base_url() ?>">Beranda</a> / Jadwal Dokter</p>-->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- BAGIAN KONTEN -->
<section class="blog_area section-padding">
  <div class="container">
    <div class="row">
      <!-- List Dokter -->
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="row doctor-cards-container"></div>
      </div>

      <!-- Filter Sidebar -->
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

<!-- JQUERY + SELECT2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
  const baseUrl = '<?= base_url() ?>';
  const $doctorCardsContainer = $('.doctor-cards-container');

  // Inisialisasi Select2
  $('#doctorSelect, #poliSelect').select2({ width: '100%', allowClear: true });

  // Muat jadwal awal & filter
  loadInitialSchedules();
  loadFilterOptions();

  function loadInitialSchedules() {
    $.getJSON(baseUrl + 'get-jadwal-dokter')
      .done(renderDoctorCards)
      .fail(() => {
        $doctorCardsContainer.html('<p class="text-danger">Gagal memuat jadwal awal.</p>');
      });
  }

  function loadFilterOptions() {
    $.getJSON(baseUrl + 'get-doctor-filter-options', function(data) {
      if (data.doctors) {
        data.doctors.forEach(d => $('#doctorSelect').append(`<option value="${d}">${d}</option>`));
      }
      if (data.poli) {
        data.poli.forEach(p => $('#poliSelect').append(`<option value="${p}">${p}</option>`));
      }
      $('#doctorSelect, #poliSelect').trigger('change'); // re-init Select2
    });
  }

  $('#searchBtn').click(function() {
    const params = new URLSearchParams();
    const namaDokter = $('#doctorSelect').val();
    const poli = $('#poliSelect').val();
    const hari = $('.hari-checkbox:checked').map(function() { return $(this).val(); }).get();

    if (namaDokter) params.append('nama_dokter', namaDokter);
    if (poli) params.append('poli', poli);
    hari.forEach(h => params.append('hari[]', h));

    $.getJSON(baseUrl + 'get-jadwal-dokter?' + params.toString())
      .done(renderDoctorCards)
      .fail(() => {
        $doctorCardsContainer.html('<p class="text-danger">Gagal mencari jadwal. Silakan coba lagi.</p>');
      });
  });

  function renderDoctorCards(doctors) {
    $doctorCardsContainer.empty();
    if (!doctors || doctors.length === 0) {
      $doctorCardsContainer.append('<p class="text-muted text-center py-4">Tidak ada dokter ditemukan.</p>');
      return;
    }

    doctors.forEach(doctor => {
      const photoPath = doctor.jadwal_details?.[0]?.photo || 'default.jpg';
      const card = `
        <div class="col-md-12">
          <div class="card border shadow-sm mb-4">
            <div class="card-body p-3">
              <div class="d-flex align-items-center mb-3">
                <img src="uploads/doctor/${photoPath}" alt="${escapeHtml(doctor.nama_dokter)}"
                     class="me-3" style="width:60px; height:60px; object-fit:cover; border-radius:4px;">
                <div>
                  <h5 class="mb-0 fw-bold">${escapeHtml(doctor.nama_dokter)}</h5>
                  <p class="text-muted small mb-0">${escapeHtml(doctor.poli)}</p>
                </div>
              </div>
              <div class="text-end border-top pt-2">
                <button type="button" class="btn boxed-btn3-blue toggle-schedule-btn"
                        data-doctor-name="${escapeHtml(doctor.nama_dokter)}"
                        data-status="closed">
                  <i class="bi bi-calendar-plus me-1"></i> Lihat Jadwal
                </button>
              </div>
            </div>
            <div class="schedule-details p-3 border-top bg-light" style="display:none;"></div>
          </div>
        </div>`;
      $doctorCardsContainer.append(card);
    });
  }

  $doctorCardsContainer.on('click', '.toggle-schedule-btn', function() {
    const $btn = $(this);
    const $schedule = $btn.closest('.card').find('.schedule-details');
    const doctorName = $btn.data('doctor-name');
    const status = $btn.data('status');

    if (status === 'closed') {
      $btn.html('Tutup Jadwal <span class="spinner-border spinner-border-sm ms-1"></span>').data('status', 'loading');

      $.getJSON(baseUrl + 'get-jadwal-dokter', { doctorName, mode: 'detail' })
        .done(function(response) {
          let html = '';
          if (response.length > 0) {
            const daily = {};
            const specs = new Set();
            const hariOrder = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

            response.forEach(j => {
              if (!daily[j.hari]) daily[j.hari] = [];
              daily[j.hari].push(`${escapeHtml(j.jam_mulai)} - ${escapeHtml(j.jam_selesai)}`);
              if (j.specialization) specs.add(escapeHtml(j.specialization));
            });

            html = `
              <div class="card bg-white border-0 shadow-sm p-3 small mt-3">
                <h6 class="text-primary fw-semibold mb-2">
                  Spesialis - ${specs.size ? [...specs].join(', ') : 'Tersedia'}
                </h6>
                <div class="table-responsive">
                  <table class="table table-borderless text-center align-middle mb-0">
                    <thead class="table-light">
                      <tr>${hariOrder.map(h => `<th>${h}</th>`).join('')}</tr>
                    </thead>
                    <tbody>
                      <tr>${hariOrder.map(h => `<td>${(daily[h] || ['-']).join('<br>')}</td>`).join('')}</tr>
                    </tbody>
                  </table>
                </div>
              </div>`;
          } else {
            html = `<div class="card bg-white border-0 shadow-sm p-3">
                      <p class="text-muted text-center mb-0">Tidak ada jadwal tersedia.</p>
                    </div>`;
          }
          $schedule.html(html).slideDown();
          $btn.text('Tutup Jadwal').data('status', 'open');
        })
        .fail(() => {
          $schedule.html('<div class="alert alert-danger mb-0">Gagal memuat jadwal.</div>').slideDown();
          $btn.text('Lihat Jadwal').data('status', 'closed');
        });
    } else {
      $schedule.slideUp(() => $schedule.empty());
      $btn.text('Lihat Jadwal').data('status', 'closed');
    }
  });

  // Escape HTML aman
  function escapeHtml(text) {
    if (!text) return '';
    return text.replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]));
  }
});
</script>
