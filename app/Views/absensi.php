<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<div class="attendance-wrapper">

    <div id="absen-alert">

    </div>

    <!-- Title Section -->
    <section class="attendance-header">
        <h1>Absensi Kehadiran</h1>
        <p>Pindai kode QR yang diberikan oleh mentor Anda untuk menandai kehadiran Anda</p>
    </section>

    <!-- Main Scanner Card -->
    <div class="scanner-card">

        <h2>Scan Qr Absen</h2>
        <p class="subtext">Posisikan kode QR di dalam bingkai untuk memindai secara otomatis</p>

        <div id="reader" style="width:100%;"></div>

        <div id="scanAlert" class="mt-3"></div>
        <audio id="sfx1" src="/sfx/money-soundfx.mp3"></audio>
        <audio id="sfx2" src="/sfx/yahallo_1.mp3"></audio>

        <!-- Button -->
        <button class="scan-btn" onclick="getCameraAccess()">Start Scanning</button>

        <!-- Tips -->
        <div class="tips-box">
            <div class="bi bi-lightbulb w-20 h-20">
                Tips
            </div>
            <h3>Scanning:</h3>
            <ul>
                <li>Usahakan pencahayaan terbaik</li>
                <li>Tahan device stabil</li>
                <li>Pertahankan QR Code dengan benar</li>
                <li>Izinkan kamera di device anda</li>
            </ul>
        </div>

    </div>

</div>

<script>
    const html5QrCode = new Html5Qrcode("reader");

    let audioUnlocked = false;

    function unlockAudio() {
        if (audioUnlocked) return;

        const s1 = document.getElementById("sfx1");
        const s2 = document.getElementById("sfx2");

        // Play → segera pause → ini "unlock"
        s1.play().then(() => {
            s1.pause();
            s1.currentTime = 0;
        });

        s2.play().then(() => {
            s2.pause();
            s2.currentTime = 0;
        });

        audioUnlocked = true;
    }


    function onScanSuccess(decodedText) {

        const qrObj = JSON.parse(decodedText);
        fetch("/absen/check", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ qr: qrObj })
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === false) {
                    showHtmlAlert(data.message, "danger")
                    console.log(decodedText)
                } else {
                    showHtmlAlert("Anda telah berhasill absen")
                    showPopUp("Anda berhasil absen hari ini")
                    playSfx()
                    html5QrCode.stop()
                }
            })
            .catch((error) => {
                showHtmlAlert(`Qrcode invalid ${error}`, "danger");
            });
    }

    function getCameraAccess() {
        unlockAudio()
        Html5Qrcode.getCameras().then(devices => {
            html5QrCode.start(
                devices[0].id,
                { fps: 10, qrbox: 500 },
                onScanSuccess
            );
        });
    }

    function playSfx() {
        const s1 = document.getElementById("sfx1");
        const s2 = document.getElementById("sfx2");

        s1.currentTime = 0;
        s2.currentTime = 0;

        let finished = 0;

        function checkDone() {
            finished++;
            if (finished === 2) {
                window.location.href = "/dashboard";
            }
        }

        s1.onended = checkDone;
        s2.onended = checkDone;

        s1.play();
        s2.play();
    }


    function showHtmlAlert(message, type = "success") {
        document.getElementById("scanAlert").innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    }

    function showPopUp(message) {
        document.getElementById('absen-alert').innerHTML = `
            <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                        Berhasil Absensi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
    ${message}
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Yeayy</button>
                </div>
            </div>
        </div>
    </div>
        `;
    }

</script>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>