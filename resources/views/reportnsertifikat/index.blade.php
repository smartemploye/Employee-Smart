@extends('layout.master')

@section('content')
@foreach ($data as $data)
<div class="form-group row">
    <label for="inputSuratPengajuan" class="col-sm-2 col-form-label">Format Laporan Akhir</label>
    <div class="col-sm-10">
        <a href="{{ asset('format_laporan_akhir/'.$data->format_laporan_akhir) }}" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> {{ $data->format_laporan_akhir }}</a>
    </div>
</div>
<td>
    <form action="{{ route('postdatamagang', auth()->user()->siswa->id ) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="margin-left: 15px;">
            <label for="inputLaporanAkhir">Upload Laporan Akhir</label>
            <input type="file" name="laporan_akhir" class="form-control-file @error('laporan_akhir') is-invalid @enderror" id="laporan_akhir" accept="pdf/*" value="{{ old('laporan_akhir') }}">
            {{-- <div class="input-group-append">
            </div> --}}
            <button type="submit"> Upload</button>
            @error('laporan_akhir')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </form>
</td>
<h3>Silahkan Download Sertifikat</h3>
<input type="submit" value="Sertifikat Magang">
@endforeach
@endsection
