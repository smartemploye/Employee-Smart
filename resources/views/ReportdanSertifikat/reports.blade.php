@extends('layout.master')

@section('judul')
Halaman Report dan Sertifikat
@endsection

@section('content')

<<<<<<< HEAD
  <div class="form-group">
=======
<div class="form-group">
>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
    <label>Download Format Laporan Akhir</label>
    @if($pembimbing && $pembimbing->format_laporan_akhir)
        <a href="{{ url('format_laporan_akhir/'.$pembimbing->format_laporan_akhir) }}" class="btn btn-primary btn-sm mb-3">Unduh</a>
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
<<<<<<< HEAD
      <label for="laporan_akhir" class="col-sm-2 col-form-label">Upload Laporan Akhir</label>
      <div class="col-sm-10">
        <input type="file" id="laporan_akhir" name="laporan_akhir" class="form-control-file @error('laporan_akhir') is-invalid @enderror" id="laporan_akhir" value="{{ old('laporan_akhir') }}">
        @error('laporan_akhir')
            <div class="alert alert-danger mt-2" style="width: 530px">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: 40%;margin-top:-10%">Submit</button>
  </form>
=======
        <label for="laporan_akhir" class="col-sm-2 col-form-label">Upload Laporan Akhir (PDF)</label>
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
>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
@endif




@if($siswa && $siswa->data_magang && $siswa->data_magang->laporan_akhir)
<div class="form-group">
    <label>Lihat Laporan Akhir yang Telah di Upload</label>
    <a href="{{ asset('laporan_akhir/'.$siswa->data_magang->laporan_akhir) }}" class="btn btn-primary btn-sm mb-3">Lihat</a>
    {{-- <a href="{{ asset('laporan_akhir/'.$siswa->data_magang->laporan_akhir) }}" >Download</a> --}}
</div>
@endif
<div class="form-group">
  <label>Download Sertifikat</label>
  @if($siswa && $siswa->data_magang && $siswa->data_magang->sertifikat)
      <a href="{{ asset('sertifikat/'.$siswa->data_magang->sertifikat) }}" class="btn btn-primary btn-sm mb-3">Unduh</a>
  @else
      <p>Sertifikat belum tersedia.</p>
  @endif
</div>

@endsection
