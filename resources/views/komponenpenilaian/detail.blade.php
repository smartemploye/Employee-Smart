@extends('layout.master')

@section('judul')
Halaman Details Komponen Penilaian
@endsection

@section('content')

<table class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">#</th>
        <th>Komponen</th>
        <th>Value</th>
        {{-- <th style="width: 40px">Label</th> --}}
      </tr>
    </thead>
    <tbody>

        {{-- baru di buat --}}
      <tr>
        <td>1.</td>
        <td>Nama Komponen</td>
        <td>
          <div class="">
            <div class="" style="">{{$komponenpenilaian->nama_komponen}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-danger">100%</span></td> --}}
      </tr>
      <tr>

        <tr>
          <td>2.</td>
          <td>Presentase</td>
          <td>
            <div class="">
              <div class="" style="">{{$komponenpenilaian->presentase}}</div>
            </div>
          </td>
          {{-- <td><span class="badge bg-danger">100%</span></td> --}}
        </tr>
        <tr>


    </tbody>
  </table>

  <br>
<a href="/komponenpenilaian" class="btn btn-secondary btn-sm">Kembali</a>

@endsection