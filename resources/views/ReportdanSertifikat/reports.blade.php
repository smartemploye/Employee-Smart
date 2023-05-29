@extends('layout.master')

@section('content')
<h3>Format Laporan Akhir</h3>
<input type="submit" value="Download Format Laporan Akhir">
<h3>Silahkan Upload Laporan Akhir</h3>
<input type="submit" value="Upload File(Format PDF)">
<h3>Silahkan Download Sertifikat</h3>

@if($settingMagang)
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Sertifikat</label>
    <div class="col-4">
        <div class="card">
            @foreach($settingMagang as $data)
            <img src="{{asset('image/' . $data->Sertifikat)}}" class="card-img-top" alt="Sertifikat">
            @endforeach
        </div>
    </div>
</div>
@else
<h2>Tidak Ada Postingan</h2>
@endif


{{-- <input type="submit" value="Sertifikat Magang"> --}}
@endsection
