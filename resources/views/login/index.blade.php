@extends('layouts.app')

@section('content')
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <style>
          /* Style untuk form login */
          body {
            font-family: Arial, sans-serif;
            background-color: #bb1d1d;
          }
          form {
            margin: 100px auto;
            width: 300px;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
          }
          input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
          }
          button:hover {
            background-color: #45a049;
          }
          /* Style untuk judul login */
          h2 {
            text-align: center;
            color: #333;
          }
        </style>
      </head>
      <body>
        <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
        <form action="/postlogin" style="margin-top: -20px;" method="POST">
            @csrf
          <h1 style="text-align: center; color: white;">Login</h1>
          <h2 style="color: white;">Garuda Cyber Indonesia</h2>
          <label for="email" style="color: white;" >Email</label>
          <input type="text" id="email" name="email" placeholder="Enter your Email" required>
          <label for="password" style="color: white;">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
          <a href="{{ route('bayar') }}"><button type="submit">Login</button></a>
          <h4 style="color: white; text-align: center;">Don't have account?</h4>
          <a href="/register"><h2 style="color: #0fa2f4;">Register</h2></a>
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
