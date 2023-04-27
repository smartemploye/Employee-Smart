@extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')

<a href="/settingmagang/create" class="btn btn-primary btn-sm mb-3">Setting Magang</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jam Masuk</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($settingmagang as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->jam_Masuk_kerja}}</td>
                <td>
                    
                    <form action="/settingmagang/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/settingmagang/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/settingmagang/{{$value->id}}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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