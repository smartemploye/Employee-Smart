@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-3 font-weight-bold text-primary">Edit Peserta</h6>
                @foreach ($siswa as $data )
                <form method="POST" action="{{ route('peserta.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label style="margin-left: 5px">Nama</label>
                        <div>
                          <input type="text" name="nama_siswa" class="form-control" style="margin-left: 208px;margin-top: -35px;width: 900px" value="{{ $data->nama_siswa }}">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label style="margin-left: 5px">Tanggal Mulai Magang</label>
                          <div>
                            <input type="date" style="margin-left: 208px;margin-top: -35px;width: 900px" name="tanggal_mulai" class="form-control" value="{{ $data->tanggal_mulai }}">
                          </div>
                        </div>
                      <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Tanggal Selesai Magang</label>
                        <input type="date" class="form-control" name="tanggal_selesai" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->tanggal_selesai }}">
                      </div>
                      <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Status</label>
                          <select name="status_magang" id="">
                            <option value="Aktif">Aktif</option>
                            <option value="TIdak Aktif">TIdak Aktif</option>
                          </select>
                          {{-- <input type="text" class="form-control" name="status_magang" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->status_magang }}"> --}}
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Asal Sekolah</label>
                          <input type="text" class="form-control" name="asal_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px"value="{{ $data->nama_sekolah }}">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Judul Project</label>
                          <input type="text" class="form-control" name="judul_project" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->judul_project }}">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Nama Pembimbing</label>
                          <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_pembimbing }}">
                        </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
