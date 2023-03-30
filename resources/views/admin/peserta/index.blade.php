@extends('layout.master')

@section('content')

<button type="submit" style="color: white;background-color: rgb(46, 165, 74);border-radius: 10px;margin-left: 1100px">Tambah Data</button>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Mulai Magang</th>
        <th scope="col">Tanggal Selesai Magang</th>
        <th scope="col">Status</th>
        <th scope="col">Asal Sekolah</th>
        <th scope="col">Judul Project</th>
        <th scope="col">Nama Pembimbing</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
  </table>
@endsection
