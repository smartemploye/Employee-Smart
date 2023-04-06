@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Pembayaran</title>
	<style>
		body {
			font-family: sans-serif;
			background-color: #bb1d1d;
		}

		form {
			background-color: #bb1d1d;
			padding: 20px;
			margin: 50px auto;
			max-width: 500px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			margin-top: 0;
			text-align: center;
			color: #333;
		}

		input[type="text"], input[type="file"], input[type="submit"] {
			display: block;
			width: 100%;
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			font-size: 16px;
			color: white;
			transition: box-shadow 0.2s ease-in-out;
		}

		input[type="text"]:focus, input[type="file"]:focus, input[type="submit"]:focus {
			box-shadow: 0px 0px 10px wh;
			outline: none;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}

		input[type="submit"]:hover {
			background-color: #2E8B57;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: white;
		}
	</style>
</head>
<body>
    <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
	<form style="margin-top: 10px ;">
		<h1 style="color: white;">Proses Pengajuan Magang</h1>
        <p style="color: #62f983; margin-left: 170px;font-size: 30px">Diterima</p>
        <h2 style="color: white; margin-left: 30px;">Selamat!!! Kamu Telah Diterima</h2>
		<label for="virtual-akun" style="color: white;">Nomor Virtual Akun:</label>
		<input type="text" id="virtual-akun" name="virtual-akun" placeholder="Masukkan nomor virtual akun">

		<label for="bukti-pembayaran" style="color: white;">Bukti Pembayaran:</label>
		<input type="file" id="bukti-pembayaran" name="bukti-pembayaran">

		<input type="submit" value="Submit">
	</form>
</body>
</html>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
