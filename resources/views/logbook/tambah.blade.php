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
      <textarea name="logbook" class="form-control @error('logbook') is-invalid @enderror" id="logbook" value="{{ old('logbook') }}" cols="30" rows="10"></textarea>
        @error('logbook')
            <div class="alert alert-danger mt-2" style="width: 450px">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Foto Kegiatan</label>
        <input type="file" name="dokumentasi" class="form-control @error('dokumentasi') is-invalid @enderror" id="dokumentasi" accept="image/*" value="{{ old('dokumentasi') }}">
        @error('dokumentasi')
            <div class="alert alert-danger mt-2" style="width: 450px">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection

