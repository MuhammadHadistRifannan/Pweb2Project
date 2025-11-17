<?= $this->include('templates/header'); ?>

<div class="container py-5 text-light text-center">
  <h2 class="fw-bold mb-4">Edit Profil</h2>
  <form class="mx-auto" style="max-width: 400px;">
    <div class="mb-3">
      <input type="text" class="form-control rounded-4" placeholder="Nama Lengkap">
    </div>
    <div class="mb-3">
      <input type="email" class="form-control rounded-4" placeholder="Email">
    </div>
    <div class="mb-3">
      <input type="password" class="form-control rounded-4" placeholder="Password Baru">
    </div>
    <button class="btn btn-success w-100 rounded-4">Simpan Perubahan</button>
  </form>
</div>

<?= $this->include('templates/footer'); ?>
