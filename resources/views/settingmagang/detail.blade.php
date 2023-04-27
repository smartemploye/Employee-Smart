@extends('layout.master')

@section('judul')
Detail Setting
@endsection

@section('content')

<h5>Jam Masuk Kerja   : {{$settingmagang->jam_Masuk_kerja}}</h5>
<h5>Jam Pulang Kerja  : {{$settingmagang->jam_Pulang_kerja}}</h5>
<p>Nomor VA           : {{$settingmagang->no_va}}</p>
<p>Kuota Magang       : {{$settingmagang->Kuota_Magang}}</p>
<p>Format WA Diterima : {{$settingmagang->Format_WA_Diterima}}</p>
<p>Format WA Ditolak  : {{$settingmagang->Format_WA_Ditolak}}</p>
<p>Format WA Email    : {{$settingmagang->Format_Email}}</p>
<p>WA Kantor          : {{$settingmagang->WA_Kantor}}</p>

<a href="/settingmagang" class="btn btn-secondary btn-sm">Kembali</a>

@endsection