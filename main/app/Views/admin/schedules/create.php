<?php $this->extend('layouts/admin'); ?>
<?php $this->section('content'); ?>

<h4>Tambah Jadwal</h4>

<form id="jadwalForm" onsubmit="return false;">
    <!-- Container Jadwal Dinamis -->
    <div id="jadwalContainer"></div>

    <!-- Tombol Tambah dan Simpan -->
    <button type="button" id="addJadwalBtn" class="btn btn-primary btn-sm mb-3">+ Tambah Jadwal</button>
    <div>
        <button type="button" id="submitJadwalBtn" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('admin/schedules') ?>" class="btn btn-secondary">Kembali</a>
    </div>

</form>

<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    const doctors = <?= json_encode($doctors) ?>;

    // Saat halaman load pertama kali
    document.addEventListener('DOMContentLoaded', () => {
        addJadwalRow();
    });

    // Tambah baris jadwal
    function addJadwalRow() {
        const container = document.getElementById('jadwalContainer');
        const row = document.createElement('div');
        row.className = 'row mb-2 jadwal-row';

        // Generate dropdown dokter dari variabel JS
        let dokterOptions = `<option value="">-- Pilih Dokter --</option>`;
        doctors.forEach(d => {
            dokterOptions += `<option value="${d.name}">${d.name}</option>`;
        });

        row.innerHTML = `
            <div class="col-md-2">
                <label>Dokter</label>
                <select class="form-select name_dokter" required>
                    ${dokterOptions}
                </select>
            </div>
            <div class="col-md-2">
                <label>Hari</label>
                <select class="form-select hari" required>
                    <option value="">-- Pilih Hari --</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>Jam Mulai</label>
                <input type="time" class="form-control jam_mulai" required>
            </div>
            <div class="col-md-2">
                <label>Jam Selesai</label>
                <input type="time" class="form-control jam_selesai" required>
            </div>
            <div class="col-md-3">
                <label>Keterangan</label>
                <input type="text" class="form-control keterangan" placeholder="Opsional">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-jadwal">×</button>
            </div>
        `;
        container.appendChild(row);
    }

    // Event tambah baris
    document.getElementById('addJadwalBtn').addEventListener('click', addJadwalRow);

    // Event hapus baris
    document.getElementById('jadwalContainer').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-jadwal')) {
            e.target.closest('.jadwal-row').remove();
        }
    });

    // Submit data via AJAX
    document.getElementById('submitJadwalBtn').addEventListener('click', function() {
        const rows = document.querySelectorAll('.jadwal-row');
        const data = [];

        rows.forEach(row => {
            const nameDokter = row.querySelector('.name_dokter')?.value;
            const hari = row.querySelector('.hari')?.value;
            const jamMulai = row.querySelector('.jam_mulai')?.value;
            const jamSelesai = row.querySelector('.jam_selesai')?.value;
            const keterangan = row.querySelector('.keterangan')?.value || '';

            if (nameDokter && hari && jamMulai && jamSelesai) {
                data.push({
                    name_dokter: nameDokter,
                    hari: hari,
                    jam_mulai: jamMulai,
                    jam_selesai: jamSelesai,
                    description: keterangan
                });
            }
        });

        if (data.length === 0) {
            alert('Minimal 1 jadwal lengkap harus diisi!');
            return;
        }

        fetch('<?= base_url('admin/schedules/create') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => {
                if (res.status) {
                    alert(res.message || 'Berhasil disimpan!');
                    window.location.href = '<?= base_url('admin/schedules') ?>';
                } else {
                    alert(res.message || 'Gagal menyimpan.');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan AJAX.');
            });
    });
</script>
<?php $this->endSection(); ?>