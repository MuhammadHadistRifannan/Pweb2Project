<?= $this->include('auth/layouts/header') ?>
<?= $this->section('main') ?>
<div class="container py-5">

    <h1 class="title mb-3">Formulir QR Absensi</h1>
    <p class="text-light mb-4">Isi data berikut untuk membuat QR Absensi baru.</p>

    <div class="qr-form-box">

        <form action="/mentor/generate-qr" method="post">
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>
                    <select class="form-select text-white" style="background:#003403;" name="kelasId" id="kelas" required>
                        <option class="text-white" disabled selected>Pilih Kelas</option>
                        <?php foreach ($kelas as $k): ?>
                            <option class="text-white" value="<?= $k['id'] ?>"><?= $k['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3" id="tanggalWrapper" style="display:none;">
                    <label class="form-label text-light">Tanggal</label>
                    <input type="datetime-local" id="tanggal" name="jadwal" class="form-control form-control-simaja" readonly required>
                </div>
    
                <div class="col-md-12 mb-4">
                    <label class="form-label text-light">Token / Kode Unik</label>
                    <input type="text" id="token" name="kode" class="form-control text-dark"
                        placeholder="Contoh: HadistX95 (Masukan token uniq supaya aman)" required>
                </div>
            </div>
    
            <!-- BUTTON -->
            <button class="btn btn-generate w-100 py-2">
                Generate QR
            </button>
        </form>
        <!-- FORM INPUT -->

        <!-- HASIL QR -->
        <div id="qrResult" class="text-center mt-4"></div>

    </div>

</div>

<script>
document.getElementById("kelas").addEventListener("change", async function () {
    let kelas = this.value;

    document.getElementById("tanggalWrapper").style.display = "none";

    await fetch(`/mentor/data-kelas/${kelas}`)
        .then(res => res.json())
        .then(data => {

            if (data.status === 'success') {

                // Set value
                document.getElementById("tanggal").value = data.tanggal;

                // Tampilkan kembali
                document.getElementById("tanggalWrapper").style.display = "block";
            }
        })
        .catch(err => console.log(err));
});
</script>


<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>