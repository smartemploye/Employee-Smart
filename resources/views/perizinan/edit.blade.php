@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Perizinan</h6>
                @foreach ($databsen as $data )
                <form method="POST" action="{{ route('perizinan.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label class="col-md-4 text-md-right" style="margin-top: 5px">Dari</label>
                      <div class="col-md-6">
                        <input type="date" name="izin_dari" class="form-control" value="{{ $data->izin_dari }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-left: 560px;margin-top: -50px">Sampai</label>
                        <div class="col-md-6">
                          <input type="date" style="margin-left: 650px;margin-top: -55px" name="izin_sampai" class="form-control" value="{{ $data->izin_sampai }}" disabled >
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="inputKeteranganIzin" style="">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px" value="{{ $data->keterangan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Approve??</label>
                        <select name="approve" id="">
                            <option value="" selected selected>-Pilih-</option>
                            <option value="diapprove">Diterima</option>
                            <option value="tolak">Ditolak</option>
                        </select>
                      </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
@endsection
