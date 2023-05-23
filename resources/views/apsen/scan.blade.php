@extends('layout.master')

@section('judul')
    Smart
@endsection

@section('content')
    {{-- kamera scanner --}}
    <div class="row button">
        <div class="col-6">
            <h3>Absen Masuk</h3>
            <button class="btn btn-primary masuk" style="width:100px; height:100px" onclick="scan('masuk')"
                {!! $masuk !!}><i class='bx bx-log-in' style="font-size: 50px;"></i></button>
        </div>
        <div class="col-6">
            <h3>Absen Pulang</h3>
            <button class="btn btn-primary keluar" style="width:100px; height:100px" onclick="scan('keluar')"
                {!! $keluar !!}><i class='bx bx-log-out' style="font-size: 50px;"></i></button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <?php
            
            use Illuminate\Support\Facades\Session;
            
            echo '<input type="hidden" id="nisn" name="" value="' . Session::get('nisn') . '">';
            
            ?>
            <div id="reader">
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts') --}}
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/Html5QrCode.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/sweetalert2.js') }}" type="text/javascript"></script>
<script>
    $(function() {})
    let params;

    function scan(params) {
        let date = new Date();
        let csrf = '{{ csrf_token() }}';
        $('.button').css('display', 'none');
        const HTML5Qrcode = new Html5Qrcode('reader');
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            if (decodedText) {
                $.ajax({
                    url: '/absen',
                    type: "POST",
                    data: {
                        _token: csrf,
                        jenis: params,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status != 200) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            })
                        } else {
                            Swal.fire({
                                position: 'centered',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('.button').css('display', 'block');
                        }
                    }
                })

                HTML5Qrcode.stop();
            }
        }
        const config = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        }
        HTML5Qrcode.start({
            facingMode: "user"

        }, config, qrCodeSuccessCallback);

    }
</script>
{{-- @endsection --}}
