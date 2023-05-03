@extends('layout.master')

@section('judul')
Halaman Edit Logbook
@endsection

@section('content')

<form action="/logbook/{{$logbook->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Tanggal Logbook</label>
      <input type="date" name="tanggal_logbook" value="{{$logbook->tanggal_logbook}}" class="form-control">
    </div>
    @error('tanggal_logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Deskripsi Logbook</label>
      <textarea name="logbook" class="form-control" cols="30" rows="10">{{$logbook->logbook}}</textarea>
    </div>
    @error('logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label>Dokumentasi</label>
      <input type="file" name="dokumentasi" value="{{$logbook->dokumentasi}}" class="form-control">
    </div>
    @error('dokumentasi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection