@extends('layout.master')

@section('content')
    Dashboard


    <div class="kotak1"
        style="padding-left: 10px;background-color: #bb1d1d;border-style: solid;width: 300px;height: 150px;color: white">
        <h1>37</h1>
        <h3>Peserta yang hadir</h3>
    </div>
    <div class="kotak1"
        style="padding-left: 10px;background-color: gray;color:white; solid;width: 300px;height: 150px; margin-left: 320px;margin-top: -150px">
        <h1>50</h1>
        <h3>Peserta Magang Bulan ini</h3>
    </div>
    {{-- <?php  var_dump(Auth::guard('akun')->user()) ?> --}}
@endsection
