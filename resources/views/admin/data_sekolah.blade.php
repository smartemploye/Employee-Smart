@extends('layout.master')

@section('content')

<button type="submit" style="color: white;background-color: rgb(46, 165, 74);border-radius: 10px;margin-left: 1100px">Tambah Data</button>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIS Sekolah</th>
        <th scope="col">Nama Sekolah</th>
        <th scope="col">Alamat Sekolah</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
  </table>
@endsection
