<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>

<div class="attendance-wrapper">

    <!-- Title Section -->
    <section class="attendance-header">
        <h1>Attendance Check-In</h1>
        <p>Scan the QR code provided by your mentor to mark your attendance</p>
    </section>

    <!-- Main Scanner Card -->
    <div class="scanner-card">

        <h2>QR Code Scanner</h2>
        <p class="subtext">Position the QR code within the frame to scan automatically</p>

        <!-- Scanner Frame -->
        <div class="scanner-frame">
            <video id="cameraView" style="width: 100%; border-radius: 10px;">
                Click the button below to start scanning
            </video>
        </div>

        <!-- Button -->
        <button id="scanBtn" class="scan-btn" onclick="requestCameraAccess()">Start Scanning</button>

        <!-- Tips -->
        <div class="tips-box">
            <div class="bi bi-lightbulb w-20 h-20">Tips</div>
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

<!-- QR SCANNER JS (html5-qrcode CDN) -->
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    let scannerStarted = false;

    async function requestCameraAccess() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });

            const video = document.getElementById("cameraView");
            video.srcObject = stream;
            video.play();

            console.log("Camera access granted");

            const btn = document.getElementById("scanBtn");
            btn.innerText = "Scanning...";
            btn.disabled = true;

            startScanner();

        } catch (error) {
            console.error("Camera access denied:", error);
            alert("Camera access is required for QR scanning.");
        }
    }

    function startScanner() {
        if (scannerStarted) return;
        scannerStarted = true;

        const html5QrCode = new Html5Qrcode("cameraView");

        html5QrCode.start(
            { facingMode: "environment" },
            { fps: 10, qrbox: 250 },
            (decodedText) => {
                console.log("QR Detected: ", decodedText);
                html5QrCode.stop();
                sendScanToServer(decodedText);
            },
            (errorMessage) => {
                console.warn("Scan error:", errorMessage);
            }
        );
    }

    function sendScanToServer(qrData) {
        fetch("<?= base_url('/attendance/scan') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify({ qr: qrData })
        })
        .then(res => res.json())
        .then(response => {
            if (response.success) {
                alert("Absensi berhasil! +1 point diberikan.");
            } else {
                alert(response.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert("Terjadi kesalahan saat mengirim data scan.");
        });
    }

</script>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>