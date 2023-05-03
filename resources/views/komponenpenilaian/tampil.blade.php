@extends('layout.master')

@section('judul')
Halaman Komponen Penilaian
@endsection

@section('content')

<a href="/komponenpenilaian/create" class="btn btn-primary btn-sm mb-3">Tambah Komponen Penilaian</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Penilaian Kepribadian</th>
        <th scope="col">Penilaian Keahlian</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($komponenpenilaian as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->penilaian_kepribadian}}</td>
                <td>{{$value->penilaian_keahlian}}</td>
                <td>
                    
                    <form action="/komponenpenilaian/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/komponenpenilaian/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/komponenpenilaian/{{$value->id}}}/edit" class="btn btn-warning btn-sm">Edit</a>
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