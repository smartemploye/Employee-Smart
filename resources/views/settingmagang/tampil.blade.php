@extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jam Masuk</th>
        <th scope="col">Jam Pulang</th>
        <th scope="col">Nomor VA</th>
        <th scope="col">Kuota Magang</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($settingmagang as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->jam_Masuk_kerja}}</td>
                <td>{{$value->jam_Pulang_kerja}}</td>
                <td>{{$value->no_va}}</td>
                <td>{{$value->Kuota_Magang}}</td>
                <td>
                    
                    <form action="/settingmagang/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/settingmagang/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/settingmagang/{{$value->id}}}/edit" class="btn btn-warning btn-sm">Edit</a>
                       
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>Tidak Ada Data</td>
            </tr>
        @endforelse
    </tbody>
  </table>

@endsection