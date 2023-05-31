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
                background-color: #BB1D1D;
                color: #fff;
                font-family: Arial, sans-serif;
            }

            .form-container {
                background-color: black;
                color: #ffffff;
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

            button {
                background-color: darkgrey;
                color: white;
                /* padding: 14px 20px; */
                /* margin: 8px 0; */
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
            }
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
        <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 50px;">
                <div class="col-md-8">
                    <div class="form-container">
                        <!-- Add the image element here -->

                        {{-- <h1 style="font-family: Plus Jakarta Sans; margin-top: -170px;" class="text-center">Garuda Cyber Indonesia</h1> --}}
                        <h2 class="text-center" style="margin-top: 10px;">Register</h2>
                        <form action="/postregister" method="post" enctype="multipart/form-data">
                            @csrf
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputName">Name</label>
                                            <input type="text" name="nama_siswa"
                                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                                id="inputName" placeholder="Enter your name"
                                                style="padding-left: 10px;padding-right: 350px"
                                                value="{{ old('nama_siswa') }}">
                                            @error('nama_siswa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputSupervisor">Nama Pembimbing</label>
                                            <input type="text" name="nama_pembimbing"
                                                class="form-control @error('nama_pembimbing') is-invalid @enderror"
                                                id="inputNamapembimbing" placeholder="Enter your Mentor Name"
                                                value="{{ old('nama_pembimbing') }}">
                                            @error('nama_pembimbing')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: -190px; padding-left: 200px;">
                                            <label for="inputNisn">Nomor Induk Siswa Nasional (NISN)</label>
                                            <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="inputNisn"
                                                placeholder="Enter your NISN"
                                                style="padding-left: 10px;padding-right: 300px" value="{{ old('nisn') }}">
                                            @error('nisn')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputSupervisor">NIP Pembimbing</label>
                                            <input type="text" name="nip_pembimbing"
                                                class="form-control @error('nip_pembimbing') is-invalid @enderror"
                                                id="inputNippembimbing" placeholder="Enter your Mentor NIP"
                                                value="{{ old('nip_pembimbing') }}">
                                            @error('nip_pembimbing')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputSchool">Asal Sekolah</label>
                                            <select class="form-control @error('sekolah_id') is-invalid @enderror" name="sekolah_id" id="sekolah">
                                                <option value="" disabled selected>-- Select School --</option>
                                                @foreach ($sekolah as $sklh)
                                                    <option value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>
                                                @endforeach
                                            </select>
                                            @error('sekolah_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputSupervisor">Nomor WA Pembimbing</label>
                                            <input type="text" name="no_wa_pembimbing"
                                                class="form-control @error('no_wa_pembimbing') is-invalid @enderror"
                                                id="inputSupervisor" placeholder="Enter your Mentor number"
                                                value="{{ old('no_wa_pembimbing') }}">
                                            @error('no_wa_pembimbing')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputJenisJurusan">Jenis Jurusan</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_jurusan" id="IT" value="IT" {{ old('jenis_jurusan') == 'IT' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="IT" style="margin-right: 10px">IT</label>
                                                    <input class="form-check-input" type="radio" name="jenis_jurusan" id="Umum" value="Umum" {{ old('jenis_jurusan') == 'Umum' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Umum" style="margin-right: 10px">Umum</label>
                                                </div>
                                                @error('jenis_jurusan')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputShirtSize">Ukuran Baju</label>
                                            <select class="form-control @error('ukuran_baju') is-invalid @enderror" name="ukuran_baju" id="inputShirtSize">
                                                <option value="" selected disabled>-- Select Shirt Size --</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                            @error('ukuran_baju')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputJurusanName">Nama Jurusan</label>
                                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                                                class="form-control" id="inputJurusan" placeholder="Enter your Major"
                                                value="{{ old('jurusan') }}">
                                            @error('jurusan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputSuratPengajuan">Upload Surat Pengajuan</label>
                                            <input type="file" name="surat_pengajuan" class="form-control-file @error('surat_pengajuan') is-invalid @enderror" id="surat_pengajuan" accept="pdf/*" value="{{ old('surat_pengajuan') }}">
                                            @error('surat_pengajuan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputNowa">Nomor WA</label>
                                            <input type="text" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" id="inputNowa"
                                            placeholder="Enter your Number"
                                                value="{{ old('no_wa') }}">
                                            @error('no_wa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputEmail">Alamat Email</label>
                                            <input type="email" name="username" class="form-control @error('username') is-invalid @enderror" id="inputEmail"
                                                placeholder="Enter your email address" style="padding-right: 300px"
                                                value="{{ old('username') }}">
                                                @error('username')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputPhoto">Upload Foto</label>
                                            <input type="file" name="foto_siswa" class="form-control-file @error('foto_siswa') is-invalid @enderror" id="foto" accept="image/*" value="{{ old('foto_siswa') }}">
                                            @error('foto_siswa')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 10px;">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" placeholder="Enter your password"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputBirthdate">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="inputBirthdate" placeholder="Enter your birthdate"
                                                value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputConfirmPassword">Ulangi Password</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="inputConfirmPassword" placeholder="Enter your password again"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="inputPaketMagang">Paket Magang</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paket_magang" id="Basic" value="Basic" {{ old('paket_magang') == 'Basic' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Basic" style="margin-right: 10px">Basic</label>
                                                    <input class="form-check-input" type="radio" name="paket_magang" id="Exclusive" value="Exclusive" {{ old('paket_magang') == 'Exclusive' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Exclusive" style="margin-right: 10px">Exclusive</label>
                                                </div>
                                                @error('paket_magang')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                {{-- <a href="submit"><button type="button" >Register</button></a> --}}
                            </table>
                            <div class="button">
                                {{-- <a href="/register"><button type="button">Register</button></a> --}}
                                <input type="submit" name="submit" value="Register"
                                    style="margin-left: 400px;padding-left: 150px;padding-right: 150px;padding-top: 10px;padding-bottom: 10px" />
                            </div>
                        </form>
                        <p style="margin-left: 500px;margin-top: 10px">Already have account? <a href="/login">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
@section('script')
<script>

	$(document).ready(function() {
		$('[name="jenis_jurusan"]').change(function() {
			var v = $(this).val();
			if(v.toLowerCase() == 'IT') {
				$('#Basic').prop('checked', true);
			} else {
				$('#Exclusive').prop('checked', true);
			}
		});

		$('[name="paket_magang"]').change(function() {
			var v = $(this).val();
			if(v.toLowerCase() == 'Basic') {
				$('#IT').prop('checked', true);
			} else {
				$('#Umum').prop('checked', true);
			}
		});
	});

</script>
@endsection
