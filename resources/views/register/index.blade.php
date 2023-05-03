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
    }button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body >
    @include('sweetalert::alert')
  <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
  <div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
      <div class="col-md-8">
        <div class="form-container">
          <!-- Add the image element here -->

          {{-- <h1 style="font-family: Plus Jakarta Sans; margin-top: -170px;" class="text-center">Garuda Cyber Indonesia</h1> --}}
          <h2 class="text-center" style="margin-top: 10px;">Register</h2>
          <form action="/postregister" method="post">
            @csrf
          <table>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputName">Name</label>
                        <input type="text" name="nama_siswa" class="form-control" id="inputName" placeholder="Enter your name" style="padding-left: 10px;padding-right: 350px">
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputSupervisor">Nama Pembimbing</label>
                        <input type="text" name="nama_pembimbing" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor Name">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: -190px; padding-left: 200px;">
                        <label for="inputNisn">Nomor Induk Siswa Nasional (NISN)</label>
                        <input type="text" maxlength="10" name="nisn" class="form-control" id="inputNisn" placeholder="Enter your NISN" style="padding-left: 10px;padding-right: 300px">
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputSupervisor">NIP Pembimbing</label>
                        <input type="text" maxlength="18" name="nip_pembimbing" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor NIP">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputSchool">Asal Sekolah</label>
                        <select class="form-control" name="sekolah_id" id="sekolah" >
                          <option value="" disabled selected>-- Select School --</option>
                          @foreach ($sekolah as $sklh  )
                              <option value="{{ $sklh->id }}">{{ $sklh->nama_sekolah }}</option>
                          @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;" >
                        <label for="inputSupervisor">Nomor WA Pembimbing</label>
                        <input type="text" name="no_wa_pembimbing" maxlength="13" class="form-control" id="inputSupervisor" placeholder="Enter your Mentor number">
                      </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputJenisJurusan">Jenis Jurusan</label>
                        <div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_jurusan" id="IT" value="IT">
                                <label class="form-check-label" for="IT" style="margin-right: 10px">IT</label>
                                <input class="form-check-input" type="radio" name="jenis_jurusan" id="Umum" value="Umum">
                                <label class="form-check-label" for="Umum" style="margin-right: 10px">Umum</label>
                          </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
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
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputJurusanName">Nama Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="inputJurusanName" placeholder="Enter your Major">
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputApplication">Upload Surat Pengajuan</label>
                        <input type="file" name="surat_pengajuan" class="form-control-file" id="surat_pengajuan" accept="image/*">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputNisn">Nomor WA</label>
                        <input type="text" name="no_wa" maxlength="13" class="form-control" id="inputNisn" placeholder="Enter your number">
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputEmail">Alamat Email</label>
                        <input type="email" name="username" class="form-control" id="inputEmail" placeholder="Enter your email address" style="padding-right: 300px">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputPhoto">Upload Foto</label>
                        <input type="file" name="foto_siswa" class="form-control-file" id="foto" accept="image/*" >
                    </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 10px;">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputBirthdate">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="inputBirthdate" placeholder="Enter your birthdate">
                      </div>
                </td>
                <td>
                    <div class="form-group" style="margin-left: 15px;">
                        <label for="inputConfirmPassword">Ulangi Password</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter your password again">
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
                                <input class="form-check-input" type="radio" name="paket_magang" id="paketBasic" value="basic">
                                <label class="form-check-label" for="paketBasic" style="margin-right: 10px">Basic</label>
                                <input class="form-check-input" type="radio" name="paket_magang" id="paketBasic" value="exclusive">
                                <label class="form-check-label" for="paketBasic" style="margin-right: 10px">Exclusive</label>
                          </div>
                        </div>
                    </div>
                </td>
            </tr>

                {{-- <a href="submit"><button type="button" >Register</button></a> --}}
            </table>
            <div class="button">
                {{-- <a href="/register"><button type="button">Register</button></a> --}}
                <input type="submit" name="submit" value="Register" style="margin-left: 400px;padding-left: 150px;padding-right: 150px;padding-top: 10px;padding-bottom: 10px"/>
            </div>
          </form>
          <p style="margin-left: 500px;margin-top: 10px">Already have account? <a href="/login">Login</a></p>
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
