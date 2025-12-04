<?= $this->include('templates/header'); ?>

<style>
  .profile-box {
    background: linear-gradient(160deg, #0d2817, #133b23);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 40px;
    max-width: 550px;
    margin: auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
  }

  .profile-title {
    font-weight: 700;
    color: #e8fbe3;
    letter-spacing: 1px;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #e8fbe3;
  }

  .form-control:focus {
    background: rgba(255, 255, 255, 0.08);
    border-color: #2ecc71;
    color: #e8fbe3;
    box-shadow: none;
  }

  .btn-save {
    background: #2ecc71;
    border: none;
    color: #0e2317;
    font-weight: 600;
  }

  .btn-save:hover {
    background: #29b866;
    color: #0e2317;
  }
</style>

<?php if (session()->getFlashdata('success')): ?>
  <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header border-0">
          <h5 class="modal-title">
            <i class="bi bi-check-circle-fill me-2 text-success"></i>
            <?= session()->getFlashdata('success') ?>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= session()->getFlashdata('success') ?>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Lanjutkan</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header border-0">
          <h5 class="modal-title">
            <i class="bi bi-x-lg me-2 text-danger"></i>
            <?= session()->getFlashdata('error') ?>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= session()->getFlashdata('error') ?>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Lanjutkan</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<div class="container py-5 text-light text-center">
  <div class="profile-box">
    <h2 class="profile-title mb-4">Edit Profil</h2>

    <form action="<?= base_url('profile') ?>" method="POST">
      <div class="mb-3 text-start">
        <label class="mb-1">Nama</label>
        <input type="text" class="form-control rounded-4" name="username" placeholder="Masukkan nama lengkap">
      </div>

      <div class="mb-4 text-start">
        <label class="mb-1">Angkatan</label>
        <input type="number" class="form-control rounded-4" placeholder="Contoh: 2022">
      </div>

      <button class="btn btn-save w-100 rounded-4">Simpan Perubahan</button>
    </form>
  </div>
</div>



<?= $this->include('templates/footer'); ?>