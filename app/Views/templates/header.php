<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - EDUJAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(#122814, #0e1b18);
            font-family: "Inter", sans-serif;
            color: white;
        }


        .card-stat {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;

            /* Border halus hijau tua */
            border: 2px solid rgba(0, 40, 0, 0.4);

            /* Shadow hijau sangat lembut */
            box-shadow: 0 0 15px rgba(0, 80, 0, 0.25);

            transition: 0.3s ease;
        }

        .card-stat:hover {
            box-shadow: 0 0 10px #39BF42;
            transform: translateY(-3px);
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


        /* ========== NAVIGATION HOVER ========== */
        .nav-link-custom {
            padding: 6px 12px;
            border-radius: 10px;
            transition: 0.25s ease;
            color: white !important;
        }

        .nav-link-custom:hover {
            background: #F28E14;
            color: #fff !important;
        }

        .quick-box {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 18px;
            padding: 25px;
        }

        .quick-btn {
            padding: 20px;
            border-radius: 12px;
            font-weight: bold;
            text-align: center;
        }

        .checkin {
            background: #1a4d23;
            color: white;
        }

        .browse {
            background: #59b7ff;
            color: white;
        }

        .redeem {
            background: #df8a18;
            color: white;
        }

        .history {
            background: white;
            color: black;
        }

        .reward-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: 0.3s ease-in-out;
            box-shadow: 0 0 0 rgba(64, 192, 87, 0);
        }

        .btn-disabled-custom {
            background-color: #40c057;
            opacity: .5;
            color: #fff;
            border: none;
        }

        .btn-active-custom {
            background-color: #40c057;
            color: #fff;
            border: none;
        }

        .tag-point {
            top: 15px;
            right: 15px;
            background: #ff8b1f;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.08);

            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .reward-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 0 10px rgba(64, 192, 87, 0.6),
                0 0 20px rgba(64, 192, 87, 0.4),
                0 0 40px rgba(64, 192, 87, 0.2);
            border-color: rgba(64, 192, 87, 0.7);
        }

        .banner {
            background: #003403;
        }

        .logo {
            width: 70px;
            position: absolute;
            top: 50%;
            left: 80px;
            transform: translateY(-50%);
        }

        .shape {
            position: absolute;
            right: 0;
            top: 0;
            width: 40%;
            height: 100%;
            background: #1e482d;
            /* warna hijau */
            clip-path: polygon(5% 0, 100% 0, 100% 100%, 0% 100%);
        }



        h1,
        h2 {
            font-family: "Montserrat", sans-serif;
            font-size: 50px;
        }

        h6 {
            font-family: "Inter", sans-serif;
            color: white;
        }

        /* Background Gradient */
        .attendance-wrapper {
            min-height: 100vh;
            padding: 40px 20px;
            background: linear-gradient(180deg, #0e1f17 0%, #143b22 50%, #12451f 100%);
            color: #ffffff;
            font-family: 'Inter', sans-serif;
        }

        /* Title section */
        .attendance-header {
            text-align: left;
            margin-bottom: 50px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .attendance-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
        }

        .attendance-header p {
            opacity: 0.8;
            margin-top: 5px;
        }

        /* Main Scanner Card */
        .scanner-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            max-width: 900px;
            margin: auto;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .scanner-card h2 {
            font-family: monospace;
            text-align: center;
            margin-bottom: 5px;
        }

        .subtext {
            text-align: center;
            font-size: 0.9rem;
            opacity: 0.7;
            margin-bottom: 25px;
        }

        /* Scanner Frame */
        .scanner-frame {
            background: #204b2e;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* Scan Button */
        .scan-btn {
            width: 100%;
            padding: 12px 0;
            background: #3ad46c;
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 25px;
            transition: 0.2s ease;
        }

        .scan-btn:hover {
            background: #46e578;
        }

        /* Tips Box */
        .tips-box {
            background: rgba(20, 60, 40, 0.3);
            border-left: 3px solid #4af57a;
            padding: 15px 20px;
            border-radius: 10px;
        }

        .tips-box h3 {
            margin-bottom: 8px;
        }

        .tips-box ul {
            margin: 0;
            padding-left: 20px;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Testing Card */
        .testing-card {
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 35px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .testing-card h2 {
            font-family: monospace;
        }

        .test-format-box {
            margin: 15px 0;
            background: #062f15;
            border-radius: 8px;
            padding: 12px;
            font-family: monospace;
            font-size: 0.95rem;
        }

        /* Efek fade-in untuk seluruh halaman */
        /* Efek fade-in seluruh halaman */
        body {
            opacity: 0;
            animation: fadeIn 0.9s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-item , .card-stat , .reward-card , .scanner-card {
            opacity: 0;
            animation: fadeSlideUp 0.6s ease-out forwards;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg px-4 banner">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?= base_url('logo.png') ?>" width="50" class="me-2">
            <span class="fw-bold text-white" style="font-family: 'Courier New', monospace;">EDUJAM</span>
        </a>


        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            ☰
        </button>

        <div class="collapse navbar-collapse m-10" id="navMenu">
            <ul class="navbar-nav align-items-center shape">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/dashboard">
                            <i class="bi bi-house"></i> Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/rewards">
                            <i class="bi bi-gift"></i> Hadiah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/absen">
                            <i class="bi bi-qr-code-scan"></i> Absensi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/class">
                            <i class="bi bi-book"></i> Kelas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/logout">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </a>
                    </li>
                </ul>


                <li class="nav-item ms-3">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                        <?= $user->point ?> Pts
                    </span>
                </li>
    </nav>


    </ul>
    </div>
    </nav>