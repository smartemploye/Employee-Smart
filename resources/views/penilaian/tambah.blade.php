@extends('layout.master')

@section('judul')
Halaman Penilaian
@endsection

@section('content')

<form action="/penilaian" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Penilaian Kepribadian</label>
      <input type="text" name="penilaian_kepribadian" class="form-control">
    </div>
    @error('penilaian_kepribadian')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>penilaian_keahlian</label>
        <input type="text" name="penilaian_keahlian" class="form-control">
      </div>
      @error('penilaian_keahlian')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Operating System</label>
        <input type="text" name="operating_system" class="form-control">
      </div>
      @error('operating_system')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection