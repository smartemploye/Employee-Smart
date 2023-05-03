@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

<form action="/logbook" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Tanggal Logbook</label>
      <input type="date" name="tanggal_logbook" class="form-control">
    </div>
    @error('tanggal_logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Deskripsi Logbook</label>
      <textarea name="logbook" class="form-control" cols="30" rows="10"></textarea>
    </div>
    @error('logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Foto Kegiatan</label>
        <input type="file" name="dokumentasi" class="form-control">
      </div>
      @error('dokumentasi')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection