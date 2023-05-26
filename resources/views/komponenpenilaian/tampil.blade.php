@extends('layout.master')

@section('judul')
    Halaman Komponen Penilaian
@endsection

@section('content')
    <a href="/komponenpenilaian/create" class="btn btn-primary btn-sm mb-3">Tambah Komponen Penilaian</a>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Komponen</th>
                <th scope="col">Presentase</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($komponenpenilaian as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_komponen }}</td>
                    <td>{{ $value->presentase }}</td>
                    <td>

                        <form action="/komponenpenilaian/{{ $value->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/komponenpenilaian/{{ $value->id }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/komponenpenilaian/{{ $value->id }}}/edit" class="btn btn-warning btn-sm">Edit</a>
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
