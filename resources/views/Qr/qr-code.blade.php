<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .qr-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="p-6 qr-container">
        <div id="qrcode"></div>
        <p>Scan me to return to the original page.</p>
    </div>

    <script>
        $(function() {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "/absen",
                width: 400,
                height: 400,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    </script>
</body>
</html>
