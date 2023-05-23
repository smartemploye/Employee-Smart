@extends('layout.master')

@section('judul')
Selamat Datang
@endsection

@section('content')
<div style="text-align: center;">
    <h3 style="color: #000000;">Selamat Datang</h3>
    <h5 style="color: #0000FF;">Di PT Garuda Cyber Indonesia</h5>
    <img src="https://karirlab-prod-bucket.s3.ap-southeast-1.amazonaws.com/files/privates/hRR3VoAqhaZOhh4xukWm1113ZxqI6vaJnzs9I1xZ.png" alt="Logo" style="max-width: 400px; height: auto;">
</div>
{{-- <?php  var_dump(Auth::guard('akun')->user()) ?> --}}
@endsection

