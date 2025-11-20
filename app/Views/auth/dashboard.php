<?= $this->include('auth/layouts/header') ?>
<?= $this->section('main') ?>
<div class="container py-5">

    <h1 class="fw-bold mb-2 title">Mentor Dashboard</h1>
    <p class="text-light mb-4">Kelola kelas, absensi, dan QR Code untuk siswa</p>

    <div class="row g-4">

        <!-- QR -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="icon-box bg-icon2">
                    <i class="bi bi-qr-code"></i>
                </div>
                <h4 class="mt-3">Generate QR Absen</h4>
                <p class="text-white">Buat QR Code unik untuk absensi kelas hari ini.</p>
            </div>
        </div>

    </div>

</div>
<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>