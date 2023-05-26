@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

@include('sweetalert::alert')
<form action="/logbook" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="inputBirthdate">Tanggal Logbook</label>
        <input type="date" name="tanggal_logbook" class="form-control @error('tanggal_logbook') is-invalid @enderror" id="inputBirthdate" value="{{ old('tanggal_logbook') }}">
        @error('tanggal_logbook')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

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

