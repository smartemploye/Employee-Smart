@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pembimbing</h6>
                <form method="POST" action="{{ route('pembimbing.store') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label class="col-md-4 text-md-right" style="margin-top: 5px">Nip Pembimbing</label>
                      <div class="col-md-6">
                        <input type="number" name="nip_pembimbing" class="form-control" >
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-left: 560px;margin-top: -50px">Nama Pembimbing</label>
                        <div class="col-md-6">
                          <input type="text" style="margin-left: 650px;margin-top: -55px" name="nama_pembimbing" class="form-control" >
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="inputKeteranganIzin" style="">No Wa Pembimbing</label>
                      <input type="number" class="form-control" name="no_wa_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px">
                      </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
@endsection
