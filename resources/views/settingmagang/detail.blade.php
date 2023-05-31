@extends('layout.master')

@section('judul')
Detail Setting
@endsection

@section('content')

<table class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">#</th>
        <th>Task</th>
        <th>Progress</th>
        {{-- <th style="width: 40px">Label</th> --}}
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Jam Masuk Kerja</td>
        <td>
          <div class="">
            <div class="" style="width: 55%">{{$settingmagang->jam_Masuk_kerja}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-danger">55%</span></td> --}}
      </tr>

      <tr>
        <td>2.</td>
        <td>Jam Pulang Kerja</td>
        <td>
          <div class="">
            <div class="" style="width: 70%">{{$settingmagang->jam_Pulang_kerja}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-warning">70%</span></td> --}}
      </tr>

      <tr>
        <td>3.</td>
        <td>Nomor Rekening</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->no_va}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

      <tr>
        <td>4.</td>
        <td>Kuota Magang</td>
        <td>
          <div class="">
            <div class="" style="width: 90%">{{$settingmagang->Kuota_Magang}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-success">90%</span></td> --}}
      </tr>

      <tr>
        <td>5.</td>
        <td>Format WA Diterima</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->Format_WA_Diterima}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

      <tr>
        <td>6.</td>
        <td>Format WA Ditolak</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->Format_WA_Ditolak}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

      <tr>
        <td>7.</td>
        <td>Format Pembimbing</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->Format_Pembimbing}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

      <tr>
        <td>8.</td>
        <td>Format WA Email</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->Format_Email}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

      <tr>
        <td>9.</td>
        <td>WA Kantor</td>
        <td>
          <div class="">
            <div class="" style="width: 30%">{{$settingmagang->WA_Kantor}}</div>
          </div>
        </td>
        {{-- <td><span class="badge bg-primary">30%</span></td> --}}
      </tr>

    </tbody>
  </table>



{{-- <h5>Jam Masuk Kerja   : {{$settingmagang->jam_Masuk_kerja}}</h5>
<h5>Jam Pulang Kerja  : {{$settingmagang->jam_Pulang_kerja}}</h5>
<p>Nomor VA           : {{$settingmagang->no_va}}</p>
<p>Kuota Magang       : {{$settingmagang->Kuota_Magang}}</p>
<p>Format WA Diterima : {{$settingmagang->Format_WA_Diterima}}</p>
<p>Format WA Ditolak  : {{$settingmagang->Format_WA_Ditolak}}</p>
<p>Format WA Email    : {{$settingmagang->Format_Email}}</p>
<p>WA Kantor          : {{$settingmagang->WA_Kantor}}</p> --}}
<br>
<a href="/settingmagang" class="btn btn-secondary btn-sm">Kembali</a>

@endsection