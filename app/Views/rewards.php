<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
<div class="container py-5">

    <!-- Title Section -->
    <h2 class="fw-bold">Hadiah</h2>
    <p>Redeem poinmu dengan reward yang menarik • Kamu punya <span class="text-warning fw-bold"></span></p>

    <!-- Rewards Grid -->
    <div class="row g-4">

        <?php foreach ($rewards as $reward): ?>
            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="reward-card position-relative">

                    <div class="d-flex justify-content-end gap-2 mb-2">
                        <div class="tag-point">Point: <?= $reward['point'] ?></div>
                        <div class="tag-point">Stok: <?= $reward['stok'] ?></div>
                    </div>

                    <h5 class="btn btn-warning disabled"><?= $reward['category'] ?></h5>

                    <h5 class="fw-bold"><?= $reward['nama_reward']; ?></h5>
                    <p><?= $reward['deskripsi']; ?></p>
                    <button class="btn btn-success w-100">Tukar Reward</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>