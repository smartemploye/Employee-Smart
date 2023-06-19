@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Register Page</title>
        <!-- Link to Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <style>
            body {
                background-color: #B70404;
                color: black;
                font-family: Arial, sans-serif;
            }

            .form-container {
                background-color: #F1F6F9;
                color: #010101;
                /* padding: 30px; */
                margin-right: -200px;
                margin-left: -200px;
                padding-left: -60px;
                padding-right: -50px;
                border-radius: 5px;
                margin-top: -70px;
            }

            /* CSS to style the image */
            .img {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 150px;
                height: 150px;
                border-radius: 50%;
            }

            .error {
                color: #B70404;
                font-weight: normal;
                font-size: 12px;
            }

            /* button {
                                                                                                                                                                                                                                                                                                                                                                                    background-color: darkgrey;
                                                                                                                                                                                                                                                                                                                                                                                    color: white;
                                                                                                                                                                                                                                                                                                                                                                                    padding: 14px 20px;
                                                                                                                                                                                                                                                                                                                                                                                    margin: 8px 0;
                                                                                                                                                                                                                                                                                                                                                                                    align-items: center;
                                                                                                                                                                                                                                                                                                                                                                                    margin-bottom: 10px;
                                                                                                                                                                                                                                                                                                                                                                                    border: none;
                                                                                                                                                                                                                                                                                                                                                                                    border-radius: 4px;
                                                                                                                                                                                                                                                                                                                                                                                    cursor: pointer;
                                                                                                                                                                                                                                                                                                                                                                                    width: 350px;
                                                                                                                                                                                                                                                                                                                                                                                    height: 50px;
                                                                                                                                                                                                                                                                                                                                                                                    margin-left: 400px;
                                                                                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                                                                                button:hover {
                                                                                                                                                                                                                                                                                                                                                                                    background-color: #45a049;

                                                                                                                                                                                                                                                                                                                                                                    } */
        </style>
        <script src="{{ asset('/js/sweetalert2.js') }}" type="text/javascript"></script>
        @if ($kuota == 0)
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'kuota penuh',
                    text: 'Maaf kuota magang bulan ini penuh',
                    allowOutsideClick: false,
                    showCloseButton: false,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            </script>
        @endif
    </head>

    <body>
        @include('sweetalert::alert')
        <div class="container">
            <div class="row justify-content-center">
                <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="max-width: 20vw">
            </div>
        </div>
        <div class="container mt-5 bg-light p-3">
            {{-- <div class="form-container p-3"> --}}
            <!-- Add the image element here -->

            {{-- <h1 style="font-family: Plus Jakarta Sans; margin-top: -170px;" class="text-center">Garuda Cyber Indonesia</h1> --}}
            <h2 class="text-center" style="margin-top: 10px;">Register</h2>
            <form action="/postregister" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col order-first">
                        <div class="mb-3">
                            <label for="inputName">Nama</label>
                            <input type="text" name="nama_siswa"
                                class="form-control @error('nama_siswa') is-invalid @enderror" id="inputName"
                                placeholder="Masukkan Nama" value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputNisn">Nomor Induk Siswa Nasional (NISN)</label>
                            <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                                id="inputNisn" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
                            @error('nisn')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Asal Sekolah</label>
                            <select id="nama_sekolah" class="form-control">
                                <option value="">Pilih Sekolah</option>
                                @foreach ($sekolah as $product)
                                    <option value="{{ $product->id }}">{{ $product->nama_sekolah }}
                                    </option>
                                @endforeach
                            </select>
                            <small><a class="reg" href="" data-toggle="modal"
                                    data-target="#tambahsekolah">Daftarkan sekolah?</a></small>
                            {{-- <select class="select2" class="form-control @error('sekolah_id') is-invalid @enderror" name="sekolah_id" id="sekolah_id"
                                        data-placeholder="Nama Sekolah" style="width: 530px;margin-left: 20px;color: black">
                                            <option style="color: black"  value="" disabled selected >-- Pilih Sekolah --</option>
                                            @foreach ($sekolah as $sklh)
                                                <option style="background-color: black" {{ (old("sekolah_id") == $sklh->id ? "selected":"")}} value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>
                                            @endforeach
                                        </select>
                                        @error('sekolah_id')
                                            <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                                        @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="inputJenisJurusan">Jenis Jurusan</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_jurusan" id="IT"
                                        value="IT" {{ old('jenis_jurusan') == 'IT' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="IT" style="margin-right: 10px">IT</label>
                                    <input class="form-check-input" type="radio" name="jenis_jurusan" id="Umum"
                                        value="Umum" {{ old('jenis_jurusan') == 'Umum' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Umum" style="margin-right: 10px">Umum</label>
                                </div>
                                @error('jenis_jurusan')
                                    <div class="alert alert-danger" style="width: 530px">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Nama Jurusan</label>
                            <select id="tambah"
                                class="form-control select2 @error('jurusan') is-invalid @enderror "name="jurusan"
                                id="InputJurusan" data-placeholder="Nama Jurusan">
                                <option style="color: black" value="" disabled selected>-- Pilih
                                    Jurusan --</option>
                                @foreach ($bidang as $jurusan)
                                    <option style="background-color: black"
                                        {{ old('jurusan') == $jurusan->id ? 'selected' : '' }}
                                        value="{{ $jurusan->id }}">{{ $jurusan->nama_bidang }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="tambah1"></div>
                            @error('jurusan')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputNowa">Nomor WA</label>
                            <input type="text" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                                id="inputNowa" placeholder="Masukkan Nomor WA" value="{{ old('no_wa') }}">
                            @error('no_wa')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPhoto">Upload Foto</label>
                            <input type="file" name="foto_siswa"
                                class="form-control @error('foto_siswa') is-invalid @enderror" id="foto"
                                accept="image/*" value="{{ old('foto_siswa') }}">
                            @error('foto_siswa')
                                <div class="alert alert-danger mt-2">{{ $message }}
                                </div>
                            @enderror
                            @if (!empty($errors->all()))
                                <div class="alert alert-warning mt-2">Silahkan pilih
                                    foto kembali</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="inputBirthdate">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputBirthdate"
                                placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPaketMagang">Paket Magang</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="paket_magang" id="Basic"
                                        value="Basic" {{ old('paket_magang') == 'Basic' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Basic" style="margin-right: 10px">Basic
                                        (Seragam+Nametag)</label>
                                    <input class="form-check-input" type="radio" name="paket_magang" id="Exclusive"
                                        value="Exclusive" {{ old('paket_magang') == 'Exclusive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Exclusive" style="margin-right: 10px">Exclusive
                                        (Seragam+Nametag+Bootcamp)</label>
                                </div>
                                @error('paket_magang')
                                    <div class="alert alert-danger">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col order-last">
                        <div class="mb-3">
                            <label for="nama_pembimbing">Nama Pembimbing</label>
                            <input type="text" id="nama_pembimbing" class="form-control">
                            {{-- <input type="text" name="nama_pembimbing"
                                        class="form-control @error('nama_pembimbing') is-invalid @enderror"
                                        id="nama_pembimbing" placeholder="Masukkan Nama Pembimbing"
                                        value="{{ old('nama_pembimbing') }}">
                                        @error('nama_pembimbing')
                                        <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                                        @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="inputSupervisor">NIP Pembimbing</label>
                            <input type="text" name="nip_pembimbing"
                                class="form-control @error('nip_pembimbing') is-invalid @enderror" id="inputNippembimbing"
                                placeholder="Masukkan NIP Pembimbing" value="{{ old('nip_pembimbing') }}">
                            @error('nip_pembimbing')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="inputSupervisor">Nomor WA Pembimbing</label>
                            <input type="text" name="no_wa_pembimbing"
                                class="form-control @error('no_wa_pembimbing') is-invalid @enderror" id="inputSupervisor"
                                placeholder="Masukkan Nomor Pembimbing" value="{{ old('no_wa_pembimbing') }}">
                            @error('no_wa_pembimbing')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="inputShirtSize">Ukuran Baju</label>
                            <select class="form-control @error('ukuran_baju') is-invalid @enderror" name="ukuran_baju"
                                id="inputShirtSize">
                                <option style="color: black" value="" disabled selected>-- Pilih
                                    Ukuran Baju --</option>
                                <option value="S" @if (old('ukuran_baju') == 'S') {{ 'selected' }} @endif>S
                                </option>
                                <option value="M" @if (old('ukuran_baju') == 'M') {{ 'selected' }} @endif>M
                                </option>
                                <option value="L" @if (old('ukuran_baju') == 'L') {{ 'selected' }} @endif>L
                                </option>
                                <option value="XL" @if (old('ukuran_baju') == 'XL') {{ 'selected' }} @endif>
                                    XL
                                </option>
                                <option value="XXL" @if (old('ukuran_baju') == 'XXL') {{ 'selected' }} @endif>
                                    XXL
                                </option>
                            </select>
                            @error('ukuran_baju')
                                <div class="alert alert-danger" style="width: 530px">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputSuratPengajuan">Upload Surat Pengajuan (Dalam bentuk file
                                pdf)</label>
                            <input type="file" name="surat_pengajuan"
                                class="form-control @error('surat_pengajuan') is-invalid @enderror" id="surat_pengajuan"
                                accept="application/pdf">
                            @error('surat_pengajuan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            @if (!empty($errors->all()))
                                <div class="alert alert-warning mt-2" style="width: 530px">Silahkan pilih
                                    file kembali</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail">Alamat Email</label>
                            <input type="email" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="inputEmail"
                                placeholder="Masukkan Alamat Email" value="{{ old('username') }}">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                placeholder="Masukkan Password" value="{{ old('password') }}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword">Ulangi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="inputConfirmPassword" placeholder="Ulangi Password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <p>Already have account? <a href="/login" style="color: rgb(191, 11, 8)">Login</a>
                    </p>
                    <div class="button">
                        {{-- <a href="/register"><button type="button">Register</button></a> --}}
                        <input type="submit" name="submit" value="Register" />
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="tambahsekolah" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false"
                data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Sekolah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" id="formsekolah">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NPSN</label>
                                    <input type="text" name="nis" placeholder="NPSN Sekolah"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" placeholder="Nama Sekolah"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ 'template/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

        <script src="{{ 'template/dist/js/adminlte.min.js?v=3.2.0' }}"></script>
    </body>

    </html>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/jqueryvalidate.js') }}"></script>
    <script src="{{ 'template/plugins/select2/js/select2.full.min.js' }}"></script>

    <script>
        $('.reg').on('click', function() {
            $('form#formsekolah input').val('');
            $('form#formsekolah input').removeClass('is-invalid is-valid');
            $('.error').hide();
            $('.success').hide();
        })
        $('#nama_sekolah').on('change', function() {
            var idSekolah = $(this).val();
            if (idSekolah) {
                $.ajax({
                    url: '/pembimbing/' + encodeURIComponent(idSekolah),
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            $('#nama_pembimbing').val('');
                            alert(data.error);
                        } else {
                            $('#nama_pembimbing').val(data.nama_pembimbing);
                            $('input[name="nip_pembimbing"]').val(data.nip_pembimbing)
                            $('input[name="no_wa_pembimbing"]').val(data.no_wa)
                        }
                    }
                });
            } else {
                $('#nama_pembimbing').val('');
            }
        });
        $(function() {
            if ($("form#formsekolah").length > 0) {
                $("form#formsekolah").validate({
                    rules: {
                        nis: {
                            required: true,
                            number: true,
                        },
                        nama_sekolah: {
                            required: true,
                        },
                    },
                    messages: {
                        nis: {
                            required: 'Form harus diisi!',
                            number: "Dalam bentuk angka"
                        },
                        nama_sekolah: {
                            required: "Form harus diisi"
                        }
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-invalid").removeClass("is-valid");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-valid").removeClass("is-invalid");
                    },

                })
            }
            $('.select2, #nama_sekolah').select2({
                tags: true,
                width: '100%',

            });

        });

        $('form#formsekolah').submit(function(event) {
            event.preventDefault();
            let FormData = $(this).serialize();
            if ($(this).valid()) {
                $.ajax({
                    url: '/sekolah/storenew/',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: FormData,
                    success: function(data) {
                        if (data.status == 200) {
                            let option;
                            $.each(data.sekolah, function(index, value) {
                                option += '<option value=' + value.nis + '>' + value
                                    .nama_sekolah +
                                    '</option>';
                            })
                            $('#nama_sekolah').empty().append(option);
                            $('.close').trigger('click');
                            $('form#formsekolah input').val('');
                            $('form#formsekolah input').removeClass('is-invalid is-valid');
                            $('.error').hide();
                            $('.success').hide();
                            Swal.fire({
                                position: 'centered',
                                icon: 'success',
                                title: data.pesan,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.pesan,
                            })
                        }
                    }
                })
            }
        })
        $('[name="jenis_jurusan"]').change(function() {
            var v = $(this).val();
            if (v.toLowerCase() == 'IT') {
                $('#Basic').prop('checked', true);
            } else {
                $('#Exclusive').prop('checked', true);
            }
        });

        $('[name="paket_magang"]').change(function() {
            var v = $(this).val();
            if (v.toLowerCase() == 'Basic') {
                $('#IT').prop('checked', true);
            } else {
                $('#Umum').prop('checked', true);
            }
        });


        // $('.addMore').click(function(){
        //     var input = document.getElementById('tambah');
        //     input.setAttribute('disabled', true);
        //     document.getElementById('tambah1').style.display = 'block';
        // });


        // document.getElementById('sekolah').addEventListener('change', function() {
        //         var sekolahId = this.value;

        //         var xhr = new XMLHttpRequest();
        //         xhr.open('GET', '/pembimbing/' + sekolahId, true);
        //         xhr.onreadystatechange = function() {
        //             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        //                 var response = JSON.parse(xhr.responseText);
        //                 document.getElementById('nama_pembimbing').value = response.npembimbing;
        //             }
        //         };
        //         xhr.send();
        //     });


        // $(document).ready(function(){
        //     // document.getElementById('sekolah').addEventListener('change', function() {
        //     // var productId = this.value;

        //     // // Lakukan request AJAX untuk mendapatkan harga barang
        //     // fetch('/pembimbing/' + productId)
        //     //     .then(response => response.json())
        //     //     .then(data => {
        //     //         document.getElementById('nama_pembimbing').value = data.npembimbing;
        //     //     })
        //     //     .catch(error => console.error(error));
        //     // });


        // });
    </script>
@endpush

@section('script')
    @if (session('error'))
        `
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
