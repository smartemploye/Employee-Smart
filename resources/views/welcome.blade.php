
@extends('layout.master')

@section('judul')
SmartInternship
@endsection

@section('content')

{{-- Berhasil --}}
<div class="p-6">
    <div class="visible-print text-center">
        {!! QrCode::size(300)->generate("PT GARUDA CYBER INDOESIA"); !!}
        <p>Scan me to return to the original page.</p>
    </div>
</div>

{{-- kamera scanner --}}
<div class="row">
    <div class="col-6">
        <h3>Scan Masuk</h3>
        <div id="reader1" width="300px"></div>
        <div class="col-4">
            <input type="text" id="result1">
        </div>
    </div>
    <div class="col-6">
        <h3>Scan Keluar</h3>
        <div id="reader2" width="300px"></div>
        <div class="col-4">
            <input type="text" id="result2">
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    $(function() {

        function onScanSuccess1(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            $("#result1").val(decodedText);
            alert('Scan masuk berhasil!');

            // Mematikan kamera setelah scan sukses
            html5QrcodeScanner1.clear();
        }

        function onScanSuccess2(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            $("#result2").val(decodedText);
            alert('Scan keluar berhasil!');

            // Mematikan kamera setelah scan sukses
            html5QrcodeScanner2.clear();
        }

        var html5QrcodeScanner1 = new Html5QrcodeScanner(
            "reader1", {
                fps: 10,
                qrbox: 250
            });
        var html5QrcodeScanner2 = new Html5QrcodeScanner(
            "reader2", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner1.render(onScanSuccess1);
        html5QrcodeScanner2.render(onScanSuccess2);
    });
</script>
