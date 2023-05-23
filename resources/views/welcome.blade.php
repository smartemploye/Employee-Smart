@extends('layout.master')

@section('judul')
Smart
@endsection

@section('content')


<div class="p-6">
    <div class="visible-print text-center">

        <div class="d-flex" style="margin-left:60vh !important;" id="qrcode"></div>
        <p>Scan me to return to the original page.</p>
    </div>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
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
    })
</script>
