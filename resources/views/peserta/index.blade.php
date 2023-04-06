@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
            </div>
            <div class="col-9" >
                <a class="btn btn-success fa-pull-right" href="{{ route('peserta.create') }}" >
                    <i class='bx bx-plus text-white'></i>
                    {{-- <i  class="text-white"><box-icon name='plus'></box-icon></i> --}}
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
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
    <tbody>
        <?php $no=1; ?>
        @foreach ($data as $dt)
        <tr>
            <td>{{$no++ }}</td>
            <td>{{$dt->nama_siswa}}</td>
            <td>{{$dt->tanggal_mulai }}</td>
            <td>{{$dt->tanggal_selesai }}</td>
            <td>{{$dt->status_magang }}</td>
            <td>{{$dt->nama_sekolah }}</td>
            <td>{{$dt->judul_project }}</td>
            <td>{{$dt->nama_pembimbing }}</td>
            <td> <a href="{{ route('peserta.edit', $dt->id) }}" class="btn btn-success">
                <i class='bx bxs-pencil' ></i> Edit</a>
                <a href="{{ route('peserta.hapus', $dt->id) }}" class="btn btn-danger"><i class='bx bxs-trash' ></i> Hapus</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
