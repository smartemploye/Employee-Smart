@extends('layout.master')

@section('content')
<form>
    <div class="form-group row">
      <label for="inputJamKerja" class="col-sm-2 col-form-label">Jam Kerja</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" id="inputJamKerja" placeholder="Jam Kerja">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputNomorVA" class="col-sm-2 col-form-label">Nomor VA</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputNomorVA" placeholder="Nomor VA">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputKuota Magang" class="col-sm-2 col-form-label">Kuota Magang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputKuotaMagang" placeholder="Isi Kuota">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Format Konfirmasi WA</label>
        <div>
            <p style="margin-left: 10px;margin-top: 10px">Format Diterima</p>
          <input type="file" class="form-control" id="inputFormatDiterima" placeholder="Format Diterima" style="margin-left: 130px;margin-top: -50px">
          <p style="margin-left: 10px;margin-top: 20px">Format Ditolak</p>
            <input type="file" class="form-control" id="inputFormatDitolak" placeholder="Format Ditolak" style="margin-left: 130px;margin-top: -40px">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Format Konfirmasi Email</label>
        <div>
            <p style="margin-left: 10px;margin-top: 10px">Format Email</p>
          <input type="file" class="form-control" id="inputFormatEmail" placeholder="Format Email" style="margin-left: 130px;margin-top: -50px">
          </div>
      </div>
      <div class="form-group row">
        <label for="inputNomorWAKantor" class="col-sm-2 col-form-label">Nomor WA Kantor</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputNomorWAKantor" name= "inputNomorWAKantor" placeholder="Nomor Wa Kantor">
        </div>
      </div>
      <input type="button" value="Simpan Perubahan" style="margin-left: 205px;background-color: rgb(74, 166, 74);color: white;border-radius: 10px;border-color: rgb(74, 166, 74)">
  </form>
@endsection
