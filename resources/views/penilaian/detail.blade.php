@extends('layout.master')

@section('judul')
Halaman Details Penilaian
@endsection

@section('content')

<table class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">#</th>
        <th>Task</th>
        <th>Progress</th>
        <th style="width: 40px">Label</th>
      </tr>
    </thead>
    <tbody>

        {{-- baru di buat --}}
      <tr>
        <td>1.</td>
        <td>Ms Office</td>
        <td>
          <div class="">
            <div class="" style="">{{$penilaian->operating_system}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-danger">100%</span></td> --}}
      </tr>
      <tr>

        {{-- Belum --}}
        <td>2.</td>
        <td>Clean database</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar bg-warning" style="width: 70%"></div>
          </div>
        </td>
        <td><span class="badge bg-warning">70%</span></td>
      </tr>
      <tr>

        {{-- Belum --}}
        <td>3.</td>
        <td>Cron job running</td>
        <td>
          <div class="progress progress-xs progress-striped active">
            <div class="progress-bar bg-primary" style="width: 30%"></div>
          </div>
        </td>
        <td><span class="badge bg-primary">30%</span></td>
      </tr>
      <tr>

        {{-- Belum --}}
        <td>4.</td>
        <td>Fix and squish bugs</td>
        <td>
          <div class="progress progress-xs progress-striped active">
            <div class="progress-bar bg-success" style="width: 90%"></div>
          </div>
        </td>
        <td><span class="badge bg-success">90%</span></td>
      </tr>


    </tbody>
  </table>

  <br>
<a href="/penilaian" class="btn btn-secondary btn-sm">Kembali</a>

@endsection