<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>

<div class="container py-5">

    <h2 class="fw-bold mb-4">Analitik Aktivitas <?= $user->username ?></h2>

    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="stat-card text-center">
                <h4 class="fw-bold"><?= $hadir_hari_ini ?></h4>
                <p class="mb-0">Hadir Hari Ini</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <h4 class="fw-bold"><?= $total_absen ?></h4>
                <p class="mb-0">Total Kehadiran</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <h4 class="fw-bold"><?= $total_point ?></h4>
                <p class="mb-0">Total Poin</p>
            </div>
        </div>

    </div>

    <!-- CHARTS -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="chart-box">
                <h5 class="mb-3">Grafik Absensi Mingguan</h5>
                <canvas id="absenChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="chart-box">
                <h5 class="mb-3">Progress Kelas</h5>
                <canvas id="kelasChart"></canvas>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="chart-box mt-5">
        <h5 class="mb-3">Riwayat Aktivitas</h5>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Point</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $l): ?>
                    <tr>
                        <td><?= date("d M Y", strtotime($l['tanggal_gabung'])) ?></td>
                        <td><?= $l['nama_kelas'] ?></td>
                        <td><?= $l['total_point'] ?></td>
                        <td><?= $l['hadir'] == 1 ? 'Hadir' : 'Tidak Hadir' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>


<!-- CHART.JS -->
<script>
    new Chart(document.getElementById("absenChart"), {
        type: "line",
        data: {
            labels: <?= json_encode($chart_absen['label']) ?>,
            datasets: [{
                label: "Kehadiran",
                data: <?= json_encode($chart_absen['data']) ?>,
                borderColor: "#3ad46c",
                borderWidth: 3,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    min: 0,
                    max: 10,       // <--- UBAH SENDIRI
                    ticks: {
                        stepSize: 1,
                        color: 'white'
                    }
                },
                x: {
                    ticks: { color: 'white' }
                }
            }
        }
    });

    new Chart(document.getElementById("kelasChart"), {
        type: "bar",
        data: {
            labels: <?= json_encode($chart_kelas['label']) ?>,
            datasets: [{
                label: "Progress (%)",
                data: <?= json_encode($chart_kelas['data']) ?>,
                backgroundColor: "#ff8b1f"
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    min: 0,
                    max: 100,   // <--- PROGRESS MAX 100%
                    ticks: {
                        stepSize: 10,
                        color: 'white'
                    }
                },
                x: {
                    ticks: { color: 'white' }
                }
            }
        }
    });
</script>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>