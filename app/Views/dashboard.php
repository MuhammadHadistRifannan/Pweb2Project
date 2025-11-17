<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
    <div class="container mt-4">

        <h1 class="fw-bold">Selamat datang, Joko</h1>
        <p class="text-white-50">Ini tampilan progress mu</p>

        <!-- STAT CARDS -->
        <div class="row mt-4 g-3">

            <div class="col-md-3">
                <div class="card card-stat glass p-3">
                    <h6 class="text-white">Total Points</h6>
                    <h3 class="text-warning fw-bold"><?= 150 ?></h3>
                    <small class="text-white">Tetap semangat!!</small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stat glass p-3">
                    <h6 class="text-white">Bulan ini</h6>
                    <h3 class="text-primary fw-bold"><?= 20 ?></h3>
                    <small class="text-white">Sesi diikuti</small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stat glass p-3">
                    <h6 class="text-white">Total Kehadiran</h6>
                    <h3 class="text-success fw-bold"><?= 120 ?></h3>
                    <small class="text-white">Total seluruh kehadiran</small>
                </div>
            </div>

            <div class="col-md-3">
              <div class="card card-stat  glass p-3">
                  <h6 class="text-white">Anggota sejak</h6>
                    <h3 class="text-success fw-bold">Nov</h3>
                    <small class="text-white">2025</small>

                </div>
            </div>

        </div>

        <!-- QUICK ACTIONS -->
        <div class="quick-box mt-5">

            <h2 class="fw-bold">Pintasan Cepat</h2>
            <p class="text-white-50">Apa yang akan kamu lakukan hari ini?</p>

            <div class="row g-3 mt-2">

                <div class="col-md-3">
                    <a href="#" class="quick-btn checkin d-block">
                        <i class="bi bi-calendar-check fs-3 d-block mb-2"></i> Absensi
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="quick-btn browse d-block">
                        <i class="bi bi-mortarboard fs-3 d-block mb-2"></i> Cari Class
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="quick-btn redeem d-block">
                        <i class="bi bi-trophy fs-3 d-block mb-2"></i> Tukar hadiah
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="quick-btn history d-block">
                        <i class="bi bi-graph-up-arrow fs-3 d-block mb-2"></i> Lihat Riwayat
                    </a>
                </div>

            </div>
        </div>

    </div>

    <?= $this->renderSection('main') ?>
    <?= $this->include('templates/footer') ?>
