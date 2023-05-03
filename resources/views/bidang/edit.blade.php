@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-5 font-weight-bold text-primary">Edit Data Bidang</h6>
                @foreach ($bidang as $data )
                <form method="POST" action="{{ route('bidang.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bidang" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_bidang }}">
                    </div>
                        <div class="form-group">
                            <label for="inputKeteranganIzin" style="">Jenis Bidang</label>
                            <select name="jenis_jurusan" id="">
                                <option value="IT">IT</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
