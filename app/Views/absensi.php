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
        <button class="scan-btn" onclick="requestCameraAccess()">Start Scanning</button>

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
    async function requestCameraAccess() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });

            // Jika berhasil → tampilkan pada elemen video
            const video = document.getElementById("cameraView");
            video.srcObject = stream;
            video.play();

            console.log("Camera access granted");

            document.querySelector(".scan-btn").addEventListener("click", async () => {
                const btn = document.querySelector(".scan-btn");

                btn.innerText = "Scanning...";
                btn.disabled = true;

                startScanner();
            });
            
            return true;

        } catch (error) {
            console.error("Camera access denied:", error);
            alert("Camera access is required for QR scanning.");
            return false;
        }
    }

</script>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>