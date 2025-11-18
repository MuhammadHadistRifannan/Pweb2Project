<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUJAM - Study Jam Management System</title>

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

        .hero {
            text-align: center;
            padding: 80px 20px 60px;
            width: 100%;
            height: 100%;

            /* Background image */
            background: url('<?= base_url("hero.jpeg") ?>');
            background-size: cover;
            background-position: bottom;
            background-repeat: repeat;

            border-bottom: 0.1cap solid #72ff65ff;
            box-shadow: 0 10px 30px rgba(123, 255, 106, 0.25);
            ;

            /* Optional overlay biar teks tetap jelas */
            position: relative;
            z-index: 1;

            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s ease-out forwards;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            background: rgba(0, 0, 0, 0.35);
            /* Overlay gelap */
            backdrop-filter: blur(2px);
            /* blur halus */
            border-radius: 0;

            z-index: -1;
        }



        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
        }

        h1 span {
            color: #4cd964;
            font-weight: bold;
        }

        .btn-EDUJAM {
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
            font-family: 'Montserrat', sans-serif;
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

            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s ease-out forwards;
        }

        .feature-card:hover{
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.35);
            border-bottom: 1px solid #15ff00ff;
            cursor: pointer;
            transform: scale(6);
        }


        .feature-card h4 {
            font-family: 'Montserrat', sans-serif;
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

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- HERO SECTION -->
    <section class="hero">
        <img src="<?= base_url('logo.png') ?>" alt="logoprotic" class="hero-logo">

        <h1>Welcome to <span>EDUJAM</span></h1>
        <p class="mt-3 mb-4" style="max-width: 600px; margin: 0 auto;">
            Education Study Jam – Lacak perjalanan belajar Anda, dapatkan hadiah,
            dan tingkatkan keterampilan Anda
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="<?= base_url('register') ?>" class="btn btn-EDUJAM btn-green">Get Started</a>
            <a href="<?= base_url('dashboard') ?>" class="btn btn-EDUJAM btn-dark-outline">Sign In</a>
        </div>
    </section>


    <!-- FEATURES SECTION -->
    <h2 class="section-title">Jelajahi berbagai fitur study jam</h2>

    <div class="container pb-5">
        <div class="row g-4">

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="bi bi-book"></div>
                    <h4>Kelas</h4>
                    <p class="text-white-50">

                        Jelajahi dan daftar di berbagai kelas teknologi mulai dari Pengembangan Seluler hingga Desain
                        Web </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="bi bi-qr-code-scan"></div>
                    <h4>Qr Absen</h4>
                    <p class="text-white-50">
                        Check-in dengan mudah menggunakan pemindaian QR – cepat dan lancar
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="bi bi-gift"></div>
                    <h4>Hadiah</h4>
                    <p class="text-white-50">
                        Kumpulkan poin kehadiran dan tukarkan dengan hadiah </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="bi bi-graph-up-arrow"></div>
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
                Gabung dengan peserta lain dan yang sudah menggunakan EDUJAM!
            </p>

            <a href="<?= base_url('register') ?>" class="highlight-btn">
                Gabung Sekarang - Gratis
            </a>
        </div>
    </div>

</body>

<?= $this->include('templates/footer') ?>