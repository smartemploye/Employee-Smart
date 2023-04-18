@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

<a href="/logbook/create" class="btn btn-primary btn-sm mb-3">Tambah Logbook</a>

<div class="row">
    @forelse ($logbook as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('image/' . $item->dokumentasi)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3>{{$item->tanggal_logbook}}</h3>
                    {{-- <span class="badge badge-info">{{$item->kategori->nama}}</span> --}}
                    <p class="card-text">{{ Str::limit($item->logbook, 50) }}</p>
                    <a href="/logbook/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Read More</a>
                    {{-- @auth --}}
                        
                    
                <div class="row my-2">
                    <div class="col">
                        <a href="/logbook/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                    </div>

                    <div class="col">
                        <form action="/logbook/{{$item->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger btn-block btn-sm" value="Delete">

                        </form>
                    </div>
                </div>
                {{-- @endauth --}}
                </div>
            </div>
        </div>

    @empty
        <h2>Belum Ada Postingan Logbook</h2>
    @endforelse


</div>

@endsection