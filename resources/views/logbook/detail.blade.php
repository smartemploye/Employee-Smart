@extends('layout.master')

@section('judul')
Detail Logbook
@endsection

@section('content')

<img src="{{asset('image/' . $logbook->dokumentasi)}}" class="card-img-top" alt="...">

<h3>{{$logbook->tanggal_logbook}}</h3>

<hr>
<p class="card-text">{{$logbook->logbook}}</p>
<hr>
<a href="/logbook" class="btn btn-secondary btn-block btn-sm">Back</a>

@endsection
