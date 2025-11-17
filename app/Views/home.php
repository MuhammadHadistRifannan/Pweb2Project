<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAJA - Study Jam Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            background: linear-gradient(#19471d, #0f141c);
            color: white;
        }

        .hero {
            text-align: center;
            padding: 80px 20px 60px;
        }

        .hero-logo {
            width: 130px;
            margin-bottom: 20px;
        }

        h1 {
            font-family: "Courier New", monospace;
            font-size: 3rem;
        }

        h1 span {
            color: #4cd964;
            font-weight: bold;
        }

        .btn-simaja {
            padding: 10px 28px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-green {
            background-color: #35a153;
            border: none;
            color: white;
        }

        .btn-dark-outline {
            border: 2px solid #ffffff;
            color: white;
        }

        .section-title {
            font-family: "Courier New", monospace;
            font-size: 1.9rem;
            margin-top: 50px;
            margin-bottom: 40px;
            text-align: center;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 25px;
            height: 200px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .feature-card h4 {
            font-family: "Courier New", monospace;
            color: white;
        }

        .highlight-box {
            background-color: #2dbe47;
            border-radius: 25px;
            padding: 40px 30px;
            text-align: center;
            margin-top: 70px;
        }

        .glass {
            background: rgba(255, 255, 255, 0.12);
            /* putih transparan */
            border-radius: 20px;
            border: 1px solid #003403;
            /* border kaca */
            backdrop-filter: blur(12px);
            /* efek blur kaca */
            -webkit-backdrop-filter: blur(12px);
            /* untuk Safari */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            /* shadow lembut */
            padding: 20px;
        }

        .highlight-btn {
            background-color: #ff9d00;
            border: none;
            padding: 12px 30px;
            border-radius: 13px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- HERO SECTION -->
    <section class="hero">
        <img src="<?= base_url('logo.png') ?>" alt="logoprotic" class="hero-logo">

        <h1>Welcome to <span>SIMAJA</span></h1>
        <p class="mt-3 mb-4" style="max-width: 600px; margin: 0 auto;">
            Sistem Manajemen Study Jam – Lacak perjalanan belajar Anda, dapatkan hadiah,
            dan tingkatkan keterampilan Anda
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="<?= base_url('register') ?>" class="btn btn-simaja btn-green">Get Started</a>
            <a href="<?= base_url('dashboard') ?>" class="btn btn-simaja btn-dark-outline">Sign In</a>
        </div>
    </section>


    <!-- FEATURES SECTION -->
    <h2 class="section-title">Nikmati berbagai fitur study jam</h2>

    <div class="container pb-5">
        <div class="row g-4">

            <div class="col-md-3">
                <div class="feature-card">
                    <h4>Kelas</h4>
                    <p class="text-white-50">

                        Jelajahi dan daftar di berbagai kelas teknologi mulai dari Pengembangan Seluler hingga Desain
                        Web </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <h4>Qr Absen</h4>
                    <p class="text-white-50">
                        Check-in dengan mudah menggunakan pemindaian QR – cepat dan lancar
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <h4>Hadiah</h4>
                    <p class="text-white-50">
                        Kumpulkan poin kehadiran dan tukarkan dengan hadiah </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <h4>Lacak Progress</h4>
                    <p class="text-white-50">
                        Pantau perjalanan belajar Anda dan lihat seberapa jauh Anda telah berkembang
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- CALL TO ACTION SECTION -->
    <div class="container">
        <div class="highlight-box glass">
            <h3 class="fw-bold">Siap untuk melangkah bersama PROTIC ?</h3>
            <p class="text-white mt-2 mb-4">
                Gabung dengan peserta lain dan yang sudah menggunakan SIMAJA!
            </p>

            <a href="<?= base_url('register') ?>" class="highlight-btn">
                Gabung Sekarang - Gratis
            </a>
        </div>
    </div>

</body>

<?= $this->include('templates/footer') ?>