<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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

        <div id="reader" style="width:100%;"></div>

        <div id="scanAlert" class="mt-3"></div>

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
    function onScanSuccess(decodedText) {

        const qrObj =JSON.parse(decodedText);
        fetch("/absen/check", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ qr: qrObj })
        })
        .then(res => res.json())
        .then(data => {
                if (data.status === false){
                    showHtmlAlert(data.message , "danger")
                    console.log(decodedText)
                }else {
                    showHtmlAlert("Anda telah berhasill absen")
                    html5QrCode.stop()
                    window.location.href = "/dashboard"
                }
            });
    }

    function getCameraAccess() {

        Html5Qrcode.getCameras().then(devices => {
            html5QrCode.start(
                devices[0].id,
                { fps: 10, qrbox: 500 },
                onScanSuccess
            );
        });
    }

    function showHtmlAlert(message, type = "success") {
        document.getElementById("scanAlert").innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    }

</script>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>