<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .qr-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="qr-container">
        <h1>Your QR Code</h1>
        <canvas id="qrCodeCanvas"></canvas>
        <p>Scan the QR code above or share this page with others.</p>
    </div>

    <script>
        // Get the "data" parameter from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const qrData = urlParams.get('data');

        if (!qrData) {
            alert('No QR Code data provided!');
        } else {
            // Generate the QR code
            const qrCodeCanvas = document.getElementById('qrCodeCanvas');
            QRCode.toCanvas(qrCodeCanvas, qrData, { width: 300 }, function (error) {
                if (error) console.error(error);
            });
        }
    </script>
</body>
</html>
