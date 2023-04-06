@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Peserta</h6>
                @foreach ($datapeserta as $data )
                <form method="POST" action="{{ route('peserta.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-top: 5px">Nama</label>
                        <div class="col-md-6">
                          <input type="date" name="nama_siswa" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-4 text-md-right" style="margin-left: 560px;margin-top: -50px">Tanggal Mulai Magang</label>
                          <div class="col-md-6">
                            <input type="date" style="margin-left: 650px;margin-top: -55px" name="tanggal_mulai" class="form-control" >
                          </div>
                        </div>
                      <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Tanggal Selesai Magang</label>
                        <input type="text" class="form-control" name="tanggal_selesai" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                      </div>
                      <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Status</label>
                          <input type="text" class="form-control" name="status_magang" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Asal Sekolah</label>
                          <input type="text" class="form-control" name="asal_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Judul Project</label>
                          <input type="text" class="form-control" name="judul_project" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Nama Pembimbing</label>
                          <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                        </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
