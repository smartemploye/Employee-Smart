@extends('layout.master')

@section('judul')
Halaman Report dan Sertifikat
@endsection

@section('content')

  <div class="form-group">
    <label>Unduh Format Laporan Akhir</label>
    @if($pembimbing && $pembimbing->format_laporan_akhir)
        <a href="{{ url('format_laporan_akhir/'.$pembimbing->format_laporan_akhir) }}" class="btn btn-link">Unduh</a>
    @else
        <p>Belum ada format laporan akhir yang tersedia.</p>
    @endif
</div>

{{-- upload file --}}

@if (Auth::user()->role == 'siswa')
<form action="/store/{{$siswa->nisn}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group row">
        <label for="laporan_akhir" class="col-sm-2 col-form-label">Unggah Laporan Akhir (PDF)</label>
    </div>
    @error('laporan_akhir')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="file" id="laporan_akhir" name="laporan_akhir" accept=".pdf">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
        <div class="col-sm-10 offset-sm-2">
        </div>
    </div>
</form>
@endif





@if($siswa && $siswa->data_magang && $siswa->data_magang->laporan_akhir)
<div class="form-group">
    <label>Lihat Laporan Akhir yang Telah di Unggah</label>
    <a href="{{ asset('laporan_akhir/'.$siswa->data_magang->laporan_akhir) }}" class="btn btn-link">Lihat</a>
</div>
@endif
<div class="form-group">
  <label>Unduh Sertifikat</label>
  @if($settingMagang->Sertifikat)
    <a href="/ReportdanSertifikat/{{$siswa->nisn}}" class="btn btn-link">Unduh</a>
  @else
    <p>Sertifikat belum tersedia.</p>
  @endif
</div>



@endsection
