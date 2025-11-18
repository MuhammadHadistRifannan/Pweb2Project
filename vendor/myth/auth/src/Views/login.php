<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<style>
    body {
                background: radial-gradient(circle at top, #003403, #0D0D0D);

        font-family: "Inter", sans-serif;
        color: white;
    }

    /* CLEAN MODERN GLASS */
    .EDUJAM-card {
        max-width: 480px;
        width: 100%;
        padding: 50px 55px;

        background: rgba(255, 255, 255, 0.06);
        border-radius: 28px;
        border: 1px solid rgba(255, 255, 255, 0.15);

        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);

        /* Softer shadows */
        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.25),
            0 6px 20px rgba(0, 0, 0, 0.15),
            inset 0 0 0 rgba(255, 255, 255, 0.5);

        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    h3 {
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    /* FLOATING LABEL WRAPPER */
    .input-wrapper {
        position: relative;
        margin-bottom: 25px;
    }

    /* Floating Label */
    .input-wrapper label {
        position: absolute;
        top: 50%;
        left: 18px;
        transform: translateY(-50%);
        font-size: 14px;
        padding: 0 6px;

        background: rgba(15, 20, 24, 0.6);
        backdrop-filter: blur(8px);

        color: rgba(255, 255, 255, 0.75);
        pointer-events: none;
        transition: 0.2s ease;
    }

    /* Modern Input Glass */
    .EDUJAM-input {
        width: 100%;
        height: 48px;
        padding: 12px 18px;
        border-radius: 14px;

        border: 1px solid rgba(255, 255, 255, 0.22);
        background: rgba(255, 255, 255, 0.07);

        backdrop-filter: blur(14px);

        color: white;

        transition: 0.2s;
    }

    /* Floating animation */
    .EDUJAM-input:focus + label,
    .EDUJAM-input:not(:placeholder-shown) + label {
        top: -6px;
        font-size: 12px;
        opacity: 0.85;
    }

    .EDUJAM-input::placeholder {
        color: transparent;
    }

    /* Focus state */
    .EDUJAM-input:focus {
        border: 1px solid #4eff7a;
        box-shadow: 0 0 10px rgba(78, 255, 122, 0.35);
    }

    /* GLASS BUTTON */
    .EDUJAM-btn {
        height: 48px;
        border-radius: 16px;
        border: 1px solid rgba(115, 255, 140, 0.45);

        background: linear-gradient(135deg,
                rgba(69, 200, 93, 0.35),
                rgba(69, 200, 93, 0.18));

        backdrop-filter: blur(10px);
        color: white;
        font-weight: 600;

        box-shadow:
            0 6px 20px rgba(0, 255, 85, 0.22);
    }

    .EDUJAM-btn:hover {
        background: rgba(69, 200, 93, 0.5);
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