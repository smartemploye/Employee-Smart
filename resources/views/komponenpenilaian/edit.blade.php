@extends('layout.master')

@section('judul')
Halaman Edit Penilaian
@endsection

@section('content')

<form action="/komponenpenilaian/{{$komponenpenilaian->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Nama Komponen</label>
      <input type="text" name="nama_komponen" class="form-control" value="{{$komponenpenilaian->nama_komponen}}">
    </div>
    @error('nama_komponen')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Presentase</label>
        <input type="number" name="presentase" class="form-control" value="{{$komponenpenilaian->presentase}}">
      </div>
      @error('presentase')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection