<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    body {
        background: linear-gradient(#122814, #0e1b18);
        color: white;
        font-family: "Montserrat", sans-serif;
        ;
    }

    .title {
        font-size: 42px;
    }

    .admin-card {
        padding: 25px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 0 0 rgba(64, 192, 87, 0);
    }

    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow:
            0 0 10px rgba(64, 192, 87, 0.6),
            0 0 20px rgba(64, 192, 87, 0.4),
            0 0 35px rgba(64, 192, 87, 0.2);
        border-color: rgba(64, 192, 87, 0.7);
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    /* Tone icon */
    .bg-icon {
        background: rgba(89, 183, 255, 0.15);
    }

    .bg-icon2 {
        background: rgba(223, 138, 24, 0.20);
    }

    .bg-icon3 {
        background: rgba(64, 192, 87, 0.18);
    }

    /* background abu + shape hijau */
    .admin-header {
        background: #d7d6d8;
        border-bottom: 4px solid #1e482d;
        position: relative;
        z-index: 20;
    }

    /* Logo text font */
    .brand-title {
        font-family: "Courier New", monospace;
    }

    /* Bentuk hijau miring di kanan */
    .admin-header::after {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 38%;
        background: #1e482d;
        clip-path: polygon(23% 0, 100% 0, 100% 100%, 0% 100%);
        z-index: -1;
    }

    /* NAV ITEM */
    .nav-admin {
        color: #ffffffff !important;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 10px;
        transition: .25s ease;
    }

    /* Hover orange dengan glow hijau */
    .nav-admin:hover {
        background: #F28E14;
        color: #fff !important;
        box-shadow: 0 0 12px rgba(242, 142, 20, 0.4);
    }

    /* Active State (optional) */
    .nav-admin.active {
        background: #1e482d;
        color: white !important;
    }

    .dropdown-menu {
        border-radius: 12px;
    }

    .qr-form-box {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 25px;
        border: 1px solid rgba(255, 255, 255, 0.14);
        backdrop-filter: blur(12px);
    }

    .form-control-simaja {
        background: rgba(0, 0, 0, 0.25);
        border: 1px solid #2c5c36;
        color: white;
    }

    .form-control-simaja::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control-simaja:focus {
        border-color: #40c057;
        box-shadow: 0 0 10px rgba(64, 192, 87, 0.5);
        color: white;
    }

    .btn-generate {
        background: #40c057;
        border: none;
        color: #fff;
        font-weight: bold;
        border-radius: 12px;
        transition: 0.3s;
    }

    .btn-generate:hover {
        background: #51d46a;
        box-shadow: 0 0 15px #40c057;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg admin-header px-4 py-2">
        <a class="navbar-brand d-flex align-items-center" href="/admin">
            <img src="<?= base_url('logo.png') ?>" width="45" class="me-2">
            <span class="fw-bold text-dark brand-title">EDUJAM</span>
        </a>

        <!-- Toggle Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <i class="bi bi-list text-dark fs-2"></i>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link nav-admin" href="/mentor/dashboard">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-admin" href="/mentor/qr-form">
                        <i class="bi bi-qr-code-scan me-1"></i> Generate QR
                    </a>
                </li>


                <li class="nav-item dropdown ms-3">
                    <a class="nav-link nav-admin dropdown-toggle" href="#" id="adminMenu" role="button"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i> Mentor
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item text-danger" href="/logout">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>