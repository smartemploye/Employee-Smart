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
      padding: 30px;
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
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body >
  <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
  <div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
      <div class="col-md-6">
        <div class="form-container">
          <!-- Add the image element here -->

          {{-- <h1 style="font-family: Plus Jakarta Sans; margin-top: -170px;" class="text-center">Garuda Cyber Indonesia</h1> --}}
          <h2 class="text-center" style="margin-top: 10px;">Register</h2>
          <form action="/postregister" method="post">
            @csrf
            <div class="form-group" style="margin-top: 15px;">
              <label for="inputName">Name</label>
              <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="inputNisn">Nomor Induk Siswa Nasional (NISN)</label>
              <input type="text" name="nisn" class="form-control" id="inputNisn" placeholder="Enter your NISN">
            </div>
            <div class="form-group">
                <label for="inputNisn">Nomor WA</label>
                <input type="text" name="no_wa" class="form-control" id="inputNisn" placeholder="Enter your number">
              </div>
            <div class="form-group">
              <label for="inputSchool">Asal Sekolah</label>
              <select class="form-control" name="asal_sekolah" id="sekolah">
                <option value="" disabled selected>-- Select School --</option>
                @foreach ($sekolah as $sklh  )
                    <option value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="inputJurusan">Jenis Jurusan</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_jurusan" id="jurusanUmum" value="umum">
                  <label class="form-check-label" for="jurusanUmum">Umum</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_jurusan" id="jurusanIT" value="it">
                  <label class="form-check-label" for="jurusanIT">IT</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputJurusanName">Nama Jurusan</label>
              <input type="text" name="nama_jurusan" class="form-control" id="inputJurusanName" placeholder="Enter your Major">
            </div>

            <div class="form-group">
              <label for="inputBirthdate">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="inputBirthdate" placeholder="Enter your birthdate">
            </div>
            <div class="form-group">
              <label for="inputSupervisor">NIP Pembimbing</label>
              <input type="text" name="nip_pembimbing" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor NIP">
            </div>
            <div class="form-group">
                <label for="inputSupervisor">Nama Pembimbing</label>
                <input type="text" name="nama_pembimbing" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor Name">
              </div>
              <div class="form-group">
                <label for="inputSupervisor">Nomor WA Pembimbing</label>
                <input type="text" name="no_wa_pembimbing" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor number">
              </div>
            <div class="form-group">
                <label for="inputPaketMagang">Paket Magang</label>
                <div>
                  <div class="form-check form-check-inline">
                    @foreach ($paket_administrasi as $paket )
                        <input class="form-check-input" type="radio" name="paket_magang" id="paketBasic" value="{{ $paket->id }}">
                        <label class="form-check-label" for="paketBasic" style="margin-right: 10px">{{ $paket->nama_pket }}</label>
                    @endforeach
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label for="inputShirtSize">Ukuran Baju</label>
              <select class="form-control" name="ukuran_baju" id="inputShirtSize">
                <option value="" selected disabled>-- Select Shirt Size --</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="xxl">XXL</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputPhoto">Upload Foto</label>
              <input type="file" name="foto" class="form-control-file" id="foto" accept="image/*" >
            </div>
            <div class="form-group">
              <label for="inputApplication">Upload Surat Pengajuan</label>
              <input type="file" name="surat_pengajuan" class="form-control-file" id="surat_pengajuan" accept="image/*">
            </div>
            <div class="form-group">
              <label for="inputEmail">Alamat Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email address">
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password">
            </div>
            <div class="form-group">
              <label for="inputConfirmPassword">Ulangi Password</label>
              <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter your password again">
            </div>
            {{-- <input type="submit" name="submit" value="Register" style="margin-left: 10px; padding-left:200px;padding-right: 200px;padding-top: 10px;padding-bottom: 10px;"/> --}}
            <a href="Login.html"><button type="button" >Register</button></a>
            {{-- <a href="/login"><button type="button">Register</button></a> --}}
          </form>
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
