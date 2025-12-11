<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
<div class="container py-5">
    <?php
    if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Tidak bisa menukar</strong> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php
    if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hadiah Ditukar</strong> <?= session()->getFlashdata('success') ?>
            <audio id="sfx1" autoplay src="/sfx/money-soundfx.mp3"></audio>
            <audio id="sfx2" autoplay src="/sfx/yahallo_1.mp3"></audio>
        </div>
    <?php endif; ?>

    <?php
    if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Galat saat penukaran</strong> <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <!-- Title Section -->
    <h2 class="fw-bold">Hadiah</h2>
    <p>Redeem poinmu dengan reward yang menarik • Kamu punya <span class="text-warning fw-bold"><?= $user->point ?>
            point</span></p>


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

                    <h5 class="btn btn-outline-warning disabled"><?= $reward['category'] ?></h5>

                    <h5 class="fw-bold"><?= $reward['nama_reward']; ?></h5>
                    <p><?= $reward['deskripsi']; ?></p>
                    <form action="rewards/reedem/<?= $reward['nama_reward'] ?>" method="post">
                        <input type="hidden" name="point-reward" value="<?= $reward['point'] ?>">
                        <input type="hidden" name="stok" value="<?= $reward['stok'] ?>">
                        <input type="hidden" name="category" value="<?= $reward['category'] ?>">
                        <input type="hidden" name="id_reward" value="<?= $reward['id'] ?>">
                        <input type="hidden" name="point-user" value="<?= $user->point ?>">
                        <input type="hidden" name="id_user" value="<?= $user->id ?>">
                        <button type="button" class="btn btn-success w-100 rounded-3 fw-semibold btn-confirm"
                            data-bs-toggle="modal" data-bs-target="#modalTukar" <?= $reward['stok'] != 0 ? '' : 'disabled' ?>>
                            <?= $reward['stok'] != 0 ? 'Tukar dong' : 'Yah Habis' ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade" id="modalTukar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penukaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    Yakin mau tukar reward ini? 
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                    <button class="btn btn-success" id="btnTukarNow">Ya, Tukar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    let activeForm = null;

    document.querySelectorAll('.btn-confirm').forEach(btn => {
        btn.addEventListener('click', function () {
            // Ambil form terdekat (parent)
            activeForm = this.closest('form');
        });
    });

    document.getElementById('btnTukarNow').addEventListener('click', function () {
        if (activeForm) {
            activeForm.submit();
        }
    });


</script>


<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>