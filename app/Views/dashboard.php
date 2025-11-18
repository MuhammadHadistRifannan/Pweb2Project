<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>


<?php if (session()->getFlashdata('message')): ?>
<div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <h5 class="modal-title">
            <i class="bi bi-check-circle-fill me-2 text-success"></i>
            Berhasil Login
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= session()->getFlashdata('message') ?>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="container mt-4">

    <h1 class="fw-bold">Selamat datang, <?= $user->username ?></h1>
    <p class="text-white-50">Ini tampilan progress mu</p>

    <!-- STAT CARDS -->
    <div class="row mt-4 g-3">

        <div class="col-md-3">
            <div class="card card-stat fade-item glass p-3">
                <h6 class="text-white">Total Points</h6>
                <h3 class="text-warning fw-bold"><?= $user->point ?></h3>
                <small class="text-white">Tetap semangat!!</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat fade-item glass p-3">
                <h6 class="text-white">Bulan ini</h6>
                <h3 class="text-primary fw-bold"><?= $user->sesi_diikuti ?></h3>
                <small class="text-white">Sesi diikuti</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat fade-item glass p-3">
                <h6 class="text-white">Total Kehadiran</h6>
                <h3 class="text-success fw-bold"><?= $user->total_hadir ?></h3>
                <small class="text-white">Total seluruh kehadiran</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat fade-item glass p-3">
                <h6 class="text-white">Anggota sejak</h6>
                <h3 class="text-success fw-bold"><?= date('M' , strtotime($user->created_at))?></h3>
                <small class="text-white"><?= date('Y' , strtotime($user->created_at))?></small>

            </div>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="quick-box fade-item mt-5">

        <h2 class="fw-bold">Pintasan Cepat</h2>
        <p class="text-white-50">Apa yang akan kamu lakukan hari ini?</p>

        <div class="row g-3 mt-2">

            <div class="col-md-3">
                <a href="/absen" class="quick-btn checkin d-block">
                    <i class="bi bi-calendar-check fs-3 d-block mb-2"></i> Absensi
                </a>
            </div>

            <div class="col-md-3">
                <a href="/kelas" class="quick-btn browse d-block">
                    <i class="bi bi-mortarboard fs-3 d-block mb-2"></i> Cari Class
                </a>
            </div>

            <div class="col-md-3">
                <a href="/rewards" class="quick-btn redeem d-block">
                    <i class="bi bi-trophy fs-3 d-block mb-2"></i> Tukar hadiah
                </a>
            </div>

            <div class="col-md-3">
                <a href="/riwayat" class="quick-btn history d-block">
                    <i class="bi bi-graph-up-arrow fs-3 d-block mb-2"></i> Lihat Riwayat
                </a>
            </div>

        </div>
    </div>

</div>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>