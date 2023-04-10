@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-5 font-weight-bold text-primary">Edit Pembimbing</h6>
                @foreach ($pembimbing as $data )
                <form method="POST" action="{{ route('pembimbing.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nip Pembimbing</label>
                        <input type="number" class="form-control" name="nip_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                      </div>
                      <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nama Pembimbing</label>
                        <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                      </div>
                      <div class="form-group">
                        <label for="inputKeteranganIzin" style="">No Wa Pembimbing</label>
                        <input type="text" class="form-control" name="no_wa_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                      </div>
                      <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="sekolah_id" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px">
                      </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
