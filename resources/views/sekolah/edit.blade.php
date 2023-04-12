@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-5 font-weight-bold text-primary">Edit Sekolah</h6>
                @foreach ($sekolah as $data )
                <form method="POST" action="{{ route('sekolah.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nis</label>
                        <input type="text" class="form-control" name="nis" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                      </div>
                      <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Nama Sekolah</label>
                          <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                        </div>
                        <div class="form-group">
                          <label for="inputKeteranganIzin" style="">Alamat Sekolah</label>
                          <input type="text" class="form-control" name="alamat_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                        </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
