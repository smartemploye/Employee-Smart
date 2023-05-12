@extends('layout.master')

@section('judul')
Halaman Komponen Penilaian
@endsection

@section('content')

<form action="/komponenpenilaian" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Nama Komponen</label>
      <input type="text" name="nama_komponen" class="form-control">
    </div>
    @error('nama_komponen')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Presentase</label>
        <input type="number" name="presentase" class="form-control">
      </div>
      @error('presentase')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      {{-- <div class="form-group">
        <label>Operating System</label>
        <input type="text" name="operating_system" class="form-control">
      </div>
      @error('operating_system')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror --}}

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection