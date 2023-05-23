@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
    <thead>
      <tr>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Search</label>
            <form action="/peserta" method="GET">
            <input type="text" class="form-control" value=""  placeholder="nis/nama" name="nama_siswa" style="width: 20%;margin-left: -15px">
            <p style="margin-left: -15px">Nama</p>
            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_mulai" style="width: 20%; margin-left: 270px; margin-top: -78px">
            <p style="margin-left: 270px">Tanggal Mulai</p>
            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_selesai" style="width: 20%;margin-left: 550px;margin-top: -78px">
            <p style="margin-left: 550px">Tanggal Selesai</p>
            <input type="text" class="form-control" value=""  placeholder="status" name="status_magang" style="width: 20%;margin-left: 820px;margin-top: -78px">
            <p style="margin-left: 820px">Status</p>
                <button style="margin-left: -15px">Tampilkan</button>
        </form>
        </div>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Mulai Magang</th>
        <th scope="col">Tanggal Selesai Magang</th>
        <th scope="col">Status</th>
        <th scope="col">Keterangan</th>
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
            <td>{{$dt->keterangan }}</td>
            <td>{{$dt->nama_sekolah }}</td>
            <td>{{$dt->judul_project }}</td>
            <td>{{$dt->nama_pembimbing }}</td>
            <td><a href="{{ route('peserta.edit', $dt->id) }}" class="btn btn-success"><i class='bx bxs-pencil' style="width: 15px;height: 20px;"></i> Edit</a>
                <a href="{{ route('peserta.hapus', $dt->nisn) }}" class="btn btn-danger"><i class='bx bxs-trash' style="width: 15px;height: 20px;" ></i> Hapus</a>
                <a href="{{ route('peserta.show', $dt->id) }}" class="btn btn-warning" style="color: white;margin-left: 165px;margin-top: -65px;"><i class='bx bx-zoom-in'></i> Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
