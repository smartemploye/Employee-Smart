{{-- @extends('layout.master')

@section('judul')
    Halaman Apsen
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Scan Masuk</h3>
            <button id="startScan1" class="btn btn-primary">Scan Masuk</button>
            <div id="reader1" width="300px"></div>
            <div class="col-4">
                <input type="text" id="result1">
            </div>
        </div>
        <div class="col-6">
            <h3>Scan Keluar</h3>
            <button id="startScan2" class="btn btn-primary">Scan Keluar</button>
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

        $("#startScan1").click(function() {
            html5QrcodeScanner1.render(onScanSuccess1);
        });

        $("#startScan2").click(function() {
            html5QrcodeScanner2.render(onScanSuccess2);
        });

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
    });
</script> --}}

@extends('layout.master')

@section('judul')
Smart
@endsection

@section('content')
{{-- kamera scanner --}}
<div class="row">
    <div class="col-6">
        <h3>Absen Masuk</h3>
        <button id="startScan1" class="btn btn-primary">Absen Masuk</button>
        <div id="reader1" width="300px" style="display: none;"></div>
        <div class="col-4">
            <input type="text" id="result1" name="_token" value="{{ csrf_token() }}">
        </div>
    </div>
    <div class="col-6">
        <h3>Absen Pulang</h3>
        <button id="startScan2" class="btn btn-primary">Absen Pulang</button>
        <div id="reader2" width="300px" style="display: none;"></div>
        <div class="col-4">
            <input type="text" id="result2" name="_token" value="{{ csrf_token() }}">
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts') --}}
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    $(function() {
        var html5QrcodeScanner1;
        var html5QrcodeScanner2;

        function onScanSuccess1(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            $("#result1").val(decodedText);
            $.post("{{ route('absen.store') }}", { nisn: decodedText, _token: "{{ csrf_token() }}" })
                .done(function() {
                    alert('Absen Masuk Berhasil!');
                    // Mematikan kamera setelah scan sukses
                    html5QrcodeScanner1.clear();
                })
                .fail(function() {
                    alert('Terjadi kesalahan saat menyimpan absen.');
                });
        }

        function onScanSuccess2(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            $("#result2").val(decodedText);
            $.post("{{ route('absen.store') }}", { nisn: decodedText, _token: "{{ csrf_token() }}" })
                .done(function() {
                    alert('Absen Pulang Berhasil!');
                    // Mematikan kamera setelah scan sukses
                    html5QrcodeScanner2.clear();
                })
                .fail(function() {
                    alert('Terjadi kesalahan saat menyimpan absen.');
                });
        }

        $("#startScan1").click(function() {
            $("#reader1").show();
            html5QrcodeScanner1 = new Html5QrcodeScanner("reader1", {
                fps: 10,
                qrbox: 250
            });
            html5QrcodeScanner1.render(onScanSuccess1);
        });

        $("#startScan2").click(function() {
            $("#reader2").show();
            html5QrcodeScanner2 = new Html5QrcodeScanner("reader2", {
                fps: 10,
                qrbox: 250
            });
            html5QrcodeScanner2.render(onScanSuccess2);
        });
    });
</script>
{{-- @endsection --}}



