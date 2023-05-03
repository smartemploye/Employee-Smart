@extends('layout.master')

@section('judul')
Halaman Penilaian
@endsection

@section('content')

<a href="/penilaian/create" class="btn btn-primary btn-sm mb-3">Tambah Penilaian</a>

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
        @forelse ($penilaian as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->penilaian_kepribadian}}</td>
                <td>{{$value->penilaian_keahlian}}</td>
                <td>
                    
                    <form action="/penilaian/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/penilaian/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/penilaian/{{$value->id}}}/edit" class="btn btn-warning btn-sm">Edit</a>
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