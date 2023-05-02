@extends('layout.master')

@section('judul')
Halaman Edit Penilaian
@endsection

@section('content')

<form action="/komponenpenilaian/{{$komponenpenilaian->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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