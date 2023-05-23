@extends('layout.master')

@section('judul')
Halaman Jumlah Peserta
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jumlahSiswaHariIni }}</h3>
                <p>Jumlah Siswa yang Hadir Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jumlahSiswaMagangBulanIni }}</h3>
                <p>Jumlah Siswa Magang Bulan Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
        </div>
    </div>
</div>

@endsection
