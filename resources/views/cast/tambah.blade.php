@extends('layout.master')

@section('judul')
    Halaman Tambah Cast
@endsection

@section('content')

<form action="/cast" method="POST">
    @csrf
    <div class="form-group">
      <label>Nama Cast</label>
      <input type="text" name="nama" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
        <label>Umur Cast</label>
        <input type="integer" name="umur" class="form-control">
      </div>
      @error('umur')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    <div class="form-group">
      <label>Biodata Cast</label>
      <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
    </div>
    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
