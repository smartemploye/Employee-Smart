@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Perizinan</h6>
                <div class="card-body">
                <form method="POST" action="{{ route('perizinan.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <td>
                    <div class="form-group row">
                      <label class="col-md-4 text-md-right" style="margin-top: 5px">Dari</label>
                      <div class="col-md-8">
                        <input type="date" name="izin_dari" class="form-control @error('izin_dari') is-invalid @enderror" id="inputBirthdate" value="{{ old('izin_dari') }}">
                        @error('izin_dari')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    </td>
                    <td>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-left: 560px;margin-top: -50px">Sampai</label>
                        <div class="col-md-8">
                          <input type="date" style="margin-left: 650px;margin-top: -55px" name="izin_sampai" class="form-control  @error('izin_sampai') is-invalid @enderror" id="inputBirthdate" value="{{ old('izin_sampai') }}">
                          @error('izin_sampai')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </td>
                    <td>
                        <div class="form-group" style="margin-left: 15px;">
                            <label for="inputPhoto">Upload Dokumentasi</label>
                            <input type="file" name="dokumentasi" class="form-control-file @error('dokumentasi') is-invalid @enderror" id="InputDokumentasi" accept="image/*" value="{{ old('dokumentasi') }}">
                            @error('dokumentasi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                    <td>
                    <div class="form-+group">
                      <label for="inputKeteranganIzin" style="">Keterangan</label>
                      <input type="text" name="keterangan" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px" class="form-control  @error('keterangan') is-invalid @enderror" id="inputKeterangan" value="{{ old('keterangan') }}">
                      @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    </td>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
            </div>
            @if (session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif
@endsection
