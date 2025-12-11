<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>

<div class="container py-5">

    <h2 class="fw-bold text-white">Kelas Tersedia</h2>
    <p class="text-white mb-4">
        Yuk pilih kelas seru buat upgrade skill kamu 🚀
    </p>

    <div class="row g-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="modal fade" id="successModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Berhasil!
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <?= session()->getFlashdata('success') ?>
                        </div>

                        <div class="modal-footer border-0">
                            <button class="btn btn-success px-4" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    let myModal = new bootstrap.Modal(document.getElementById('successModal'));
                    myModal.show();
                });
            </script>
        <?php endif; ?>



        <?php

        $icon = [
            'mobile' => 'phone',
            'web' => 'globe',
            'devops' => 'ubuntu',
            'data' => 'database',
            'ui/ux' => 'palette-fill'
        ];

        ?>


        <!-- Card Item -->
        <?php foreach ($kelas as $k): ?>
            <div class="col-md-4">
                <div class="class-card p-4 rounded-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="icon bg-primary bg-opacity-25 text-primary p-2 rounded-3">
                            <i class="bi bi-<?= $icon[$k['category']] ?>"></i>
                        </span>
                        <span class="badge bg-success text-white">dapatkan <?= $k['point'] ?> point</span>
                    </div>

                    <h4 class="fw-bold text-white"><?= $k['nama_kelas'] ?></h4>
                    <p class="text-white-50 small mb-3">
                        <?= $k['description'] ?>
                    </p>

                    <?php
                    $sudahDaftar = false;
                    foreach ($detail_kelas as $dk) {
                        if ($dk['id_user'] == user()->id && $dk['id_kelas'] == $k['id']) {
                            $sudahDaftar = true;
                            break;
                        }
                    }
                    ?>

                    <p class="text-white mb-1"><strong>Mentor:</strong> <?= $k['mentor'] ?></p>
                    <p class="text-white mb-4"><strong>Jadwal:</strong> <?= date('D, H:i', strtotime($k['jadwal'])) ?></p>

                    <form action="/daftarkelas/<?= $k['id'] ?>" method="post">
                        <input type="hidden" name="user_id" value="<?= user()->id ?>">
                        <input type="hidden" name="id_kelas" value="<?= $k['id'] ?>">
                        <input type="hidden" name="tanggal_masuk" value="<?= date('Y-m-d') ?>">
                        <button type="button" class="btn btn-success w-100 rounded-3 fw-semibold btn-confirm"
                            data-bs-toggle="modal" data-bs-target="#modalDaftar" <?= $sudahDaftar ? "disabled" : "" ?>>
                            <?= $sudahDaftar ? "Sudah daftar" : "Daftar kelas" ?>
                        </button>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="modal fade" id="modalDaftar" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">
                        Konfirmasi daftar kelas
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <button class="btn btn-success" id="btnDaftarkelas">Ya, Daftar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Tinggal tambah card lainnya sesuai kebutuhan -->
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

    document.getElementById('btnDaftarkelas').addEventListener('click', function () {
        if (activeForm) {
            activeForm.submit();
        }
    });
</script>


<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>