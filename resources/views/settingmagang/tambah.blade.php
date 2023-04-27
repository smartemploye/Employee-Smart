@extends('layout.master')

@section('judul')
Halaman Setting Magang
@endsection

@section('content')

<form action="/settingmagang" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Jam masuk kerja --}}
    <div class="form-group row">
        <label for="inputJamKerja" class="col-sm-2 col-form-label">Jam Masuk Kerja</label>
        <div class="col-sm-10">
          <input type="time" name="jam_Masuk_kerja" class="form-control" id="inputJamKerja" placeholder="Jam Kerja">
        </div>
      </div>
      @error('jam_Masuk_kerja')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Jam Pulang Kerja --}}  
      <div class="form-group row">
        <label for="inputJamKerja" class="col-sm-2 col-form-label">Jam Pulang Kerja</label>
        <div class="col-sm-10">
          <input type="time" name="jam_Pulang_kerja" class="form-control" id="inputJamKerja" placeholder="Jam Kerja">
        </div>
      </div>
      @error('jam_Pulang_kerja')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Nomor VA --}}  
      <div class="form-group row">
        <label for="inputNomorVA" class="col-sm-2 col-form-label">Nomor VA</label>
        <div class="col-sm-10">
          <input type="text" name="no_va" class="form-control" id="inputNomorVA" placeholder="Nomor VA">
        </div>
      </div>
      @error('no_va')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Kuota Magang --}}
      <div class="form-group row">
          <label for="inputKuota Magang" class="col-sm-2 col-form-label">Kuota Magang</label>
          <div class="col-sm-10">
            <input type="text" name="Kuota_Magang" class="form-control" id="inputKuotaMagang" placeholder="Isi Kuota">
          </div>
        </div>
        @error('Kuota_Magang')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
    {{-- Format Konfirmasi WA --}}
        <div class="form-group row">
          <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Format Konfirmasi WA</label>
          <div>
              <p style="margin-left: -180px;margin-top: 35px">Format Diterima</p>
              <textarea name="Format_WA_Diterima" class="form-control" cols="30" rows="10" id="inputFormatDiterima" placeholder="Format Diterima" style="margin-left: -150px;margin-top: -10px;resize: none;width: 500px"></textarea>
              {{-- <input type="file" class="form-control" id="inputFormatDiterima " placeholder="Format Diterima" style="margin-left: 130px;margin-top: -50px"> --}}
            <p style="margin-left: 360px;margin-top: -285px">Format Ditolak</p>
              <textarea name="Format_WA_Ditolak" class="form-control" cols="30" rows="10" id="inputFormatDitolak" placeholder="Format Ditolak" style="margin-left: 390px;margin-top: -10px;resize: none;width: 500px"></textarea>
              {{-- <input type="file" class="form-control" id="inputFormatDitolak" placeholder="Format Ditolak" style="margin-left: 130px;margin-top: -40px"> --}}
          </div>
        </div>
  
  
        {{-- Format Konfirmasi Email --}}
        <div class="form-group row"> 
          <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Format Konfirmasi Email</label>
          <div>
              <p style="margin-left: -180px;margin-top: 35px">Format Email</p>
            <textarea name="Format_Email" class="form-control" cols="30" rows="10" id="inputFormatDiterima" placeholder="Format Email" style="margin-left: -150px;margin-top: -10px;resize: none;width: 500px"></textarea>
            {{-- <input type="file" class="form-control" id="inputFormatEmail" placeholder="Format Email" style="margin-left: 130px;margin-top: -50px"> --}}
            </div>
        </div>
        @error('Format_Email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  
        {{-- Nomor WA Kantor --}}
        <div class="form-group row">
          <label for="inputNomorWAKantor" class="col-sm-2 col-form-label">Nomor WA Kantor</label>
          <div class="col-sm-10">
            <input type="text" name="WA_Kantor" class="form-control" id="inputNomorWAKantor" name= "inputNomorWAKantor" placeholder="Nomor Wa Kantor">
          </div>
        </div>
        @error('WA_Kantor')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
        {{-- <input type="button" value="Simpan Perubahan" style="margin-left: 205px;background-color: rgb(74, 166, 74);color: white;border-radius: 10px;border-color: rgb(74, 166, 74)"> --}}


</form>    

@endsection