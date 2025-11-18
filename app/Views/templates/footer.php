<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>

        .icon-box {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;
            background: rgba(164, 161, 161, 0.23);
            font-size: 1.4rem;
            color: white;

            transition: 0.3s ease;
        }

        .icon-box:hover {
            background: #F28E14;
            color: #fff;
            box-shadow: 0 0 12px rgba(242, 142, 20, 0.7);
            transform: translateY(-3px);
        }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modalEl = document.getElementById('loginSuccessModal');
        if (modalEl) {
            var modal = new bootstrap.Modal(modalEl);
            modal.show();
        }
    });
</script>

<footer class="mt-5 pt-5 pb-4" style="background:#0c1b0f; color:white; border-top:1px solid rgba(0,255,0,0.15)">
    <div class="container">

        <div class="row text-center text-md-start g-4">

            <!-- Logo -->
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                    <img src="<?= base_url('logo.png') ?>" width="55" class="me-3">
                    <h5 class="fw-bold mb-0" style="font-family:'Courier New', monospace;">EduJam</h5>
                </div>
                <p class="text-white-50 mb-0">
                    Study Jam Education<br>
                    Lacak perjalanan belajar Anda bersama kami.
                </p>
            </div>

            <!-- Social Media -->
            <div class="col-md-4 text-center">
                <h6 class="fw-bold mb-3" style="font-family:'Courier New', monospace;">Connect With Us</h6>

                <div class="d-flex justify-content-center gap-3">

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/protic_pnc/" class="icon-box">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@proticpnc" class="icon-box">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wasap.at/AGic9z" class="icon-box">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <!-- Email -->
                    <a href="mailto:muhammadhadistrifannan@gmail.com" class="icon-box">
                        <i class="bi bi-envelope"></i>
                    </a>

                </div>
            </div>

            <!-- Address -->
            <div class="col-md-4 text-center text-md-start">
                <h6 class="fw-bold mb-3" style="font-family:'Courier New', monospace;">Alamat</h6>
                <p class="text-white-50 mb-0">
                    Jl. Dr. Soetomo No.1, Karangcengis, Sidakaya,<br>
                    Kec. Cilacap Sel., Kabupaten Cilacap,<br>
                    Jawa Tengah 53212
                </p>
            </div>

        </div>

        <hr class="border-success mt-4" style="opacity:0.25">

        <p class="text-center text-white-50 small mb-0">
            © <?= date('Y') ?> EDUJAM — Semua hak dilindungi undang-undang.
        </p>
    </div>
</footer>
