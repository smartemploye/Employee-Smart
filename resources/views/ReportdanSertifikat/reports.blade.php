@extends('layout.master')

@section('judul')
Halaman Report dan Sertifikat
@endsection

@section('content')

  <div class="form-group">
    <label>Download Srtifikat</label>
    <a href="/ReportdanSertifikat/{{$siswa->nisn}}"  lass="btn btn-primary btn-sm mb-3">Download</a>
  </div>
  <div class="form-group">
    <label>Download Format Laporan Akhir</label>
    <a href="{{url('format_laporan_akhir/'.$pembimbing->format_laporan_akhir)}}"  lass="btn btn-primary btn-sm mb-3">Download</a>
  </div>

 {{-- upload file --}}
<form action="/store/{{$siswa->nisn}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group row">
      <label for="laporan_akhir" class="col-sm-2 col-form-label">Upload Laporan Akhir</label>
      <div class="col-sm-10">
        <input type="file" id="laporan_akhir" name="laporan_akhir">
      </div>
    </div>
    @error('laporan_akhir')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @if($siswa->data_magang && $siswa->data_magang->laporan_akhir)
    <div class="form-group">
      <label>Lihat Laporan Akhir yang Telah di Upload</label>
      <a href="{{ asset('laporan_akhir/'.$siswa->data_magang->laporan_akhir) }}" class="btn btn-primary btn-sm">Lihat</a>
      {{-- <a href="{{ asset('laporan_akhir/'.$siswa->data_magang->laporan_akhir) }}" >Download</a> --}}
    </div>
  @endif

@endsection


