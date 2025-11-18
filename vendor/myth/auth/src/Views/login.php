<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<style>
    body {
        background: linear-gradient(#0f141c, #234d22);
        margin: 0;
        font-family: "Inter", sans-serif;
    }

    .EDUJAM-card {
        max-width: 480px;
        width: 100%;
        border-radius: 26px;
        background: #ffffff;
        padding: 40px 45px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.8s ease-out forwards;
    }

    .EDUJAM-input {
        border-radius: 12px;
        height: 45px;
    }

    .EDUJAM-btn {
        background-color: #1f5f2a;
        border-radius: 14px;
        height: 45px;
    }

    .EDUJAM-btn:hover {
        opacity: .92;
    }

    .EDUJAM-small {
        font-family: "Courier New", monospace;
        color: #333;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="d-flex align-items-center justify-content-center vh-100">

    <div class="card EDUJAM-card shadow-lg">
        <div class="text-center mb-4">
            <img src="<?= base_url('logo.png') ?>" alt="Logo" width="120">

            <h3 class="fw-bold mt-3" style="font-bold font-family: 'Courier New', monospace;">
                Selamat datang di EDUJAM
            </h3>

            <p class="EDUJAM-small mb-1">
                Login untuk masuk ke EDUJAM
            </p>
        </div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('login') ?>" method="post">
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

        <div class="text-center mt-3">
            <p class="mb-0 EDUJAM-small">
                Belum punya akun ?
                <a href="<?= url_to('register') ?>" class="fw-semibold text-success">
                    Buat akun
                </a>
            </p>
        </div>
    </div>

</div>


<?= $this->endSection() ?>