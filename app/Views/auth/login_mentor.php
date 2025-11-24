<?= $this->include('auth/head') ?>
<?= $this->section('main') ?>
<style>
    body {
        /* Radial circle gradient dari atas */
        background: radial-gradient(circle at top,
                #004d13ff 0%,
                /* hijau terang di pusat */
                #001207ff 45%,
                /* hijau gelap */
                #0e3b24 100%
                /* hijau sangat gelap */
            );
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* CARD */
    .EDUJAM-card {
        max-width: 480px;
        width: 100%;
        padding: 50px 55px;

        background: rgba(255, 255, 255, 0.08);
        border-radius: 28px;
        border: 1px solid rgba(255, 255, 255, 0.25);

        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);

        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.25),
            0 6px 20px rgba(0, 0, 0, 0.15);

        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);

        color: white !important;
        /* semua teks dalam card jadi putih */
    }

    h3,
    p,
    label {
        color: #ffffff !important;
    }

    /* INPUT WRAPPER */
    .EDUJAM-input {
        width: 100%;
        height: 48px;
        padding: 12px 18px;
        border-radius: 14px;

        border: 1px solid rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.12);

        backdrop-filter: blur(14px);

        color: #ffffff;
        transition: 0.2s;
    }

    .EDUJAM-input::placeholder {
        color: transparent;
    }

    .EDUJAM-input:focus {
        border: 1px solid #4eff7a;
        box-shadow: 0 0 10px rgba(78, 255, 122, 0.4);
    }

    /* BUTTON */
    .EDUJAM-btn {
        height: 48px;
        border-radius: 16px;
        border: 1px solid rgba(115, 255, 140, 0.55);

        background: linear-gradient(135deg,
                rgba(69, 200, 93, 0.55),
                rgba(69, 200, 93, 0.35));

        backdrop-filter: blur(10px);
        color: white;
        font-weight: 600;

        box-shadow:
            0 6px 20px rgba(0, 255, 85, 0.2);
    }

    .EDUJAM-btn:hover {
        background: rgba(69, 200, 93, 0.7);
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>



<div class="d-flex align-items-center justify-content-center vh-100">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">
                            <i class="bi x-lg me-2 text-danger"></i>
                            Tidak dapat Login
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card EDUJAM-card shadow-lg">
        <div class="text-center mb-4">
            <img src="<?= base_url('logo.png') ?>" alt="Logo" width="120">

            <h3 class="fw-bold mt-3" style="font-bold font-family: 'Courier New', monospace;">
                Selamat datang di EDUJAM Mentor
            </h3>

            <p class="EDUJAM-small mb-1">
                Login untuk masuk sebagai Mentor
            </p>
        </div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('loginmentor') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="fw-bold" for="login">Email atau Username</label>
                <input type="text" name="login" class="form-control EDUJAM-input" placeholder="Masukkan email...">
            </div>

            <div class="mb-4">
                <label class="fw-bold" for="password">Password</label>
                <input type="password" name="password" class="form-control EDUJAM-input"
                    placeholder="Masukkan password...">
            </div>

            <button type="submit" class="btn w-100 fw-bold text-white EDUJAM-btn">
                Login
            </button>
        </form>

    </div>

</div>


<?= $this->renderSection('main') ?>