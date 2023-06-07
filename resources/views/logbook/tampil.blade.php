@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

{{-- <style>
    .card {
        height: 100%;
    }

    .card-body {
        height: 500px; /* Ganti dengan tinggi yang diinginkan */
        overflow: hidden;
    }
</style> --}}
@if (Auth::user()->role == 'siswa')
<a href="/logbook/create"  class="btn btn-primary btn-sm mb-3">Tambah Logbook</a>
@endif
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#kegiatan_harian-table').DataTable();
                    });

                    function confirmDelete(url) {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            window.location.href = url;
                        }
                    }
                </script>

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
                    @if (Auth::user()->role == 'siswa')
                    <div class="row my-2">
                        <div class="col">
                            <a href="/logbook/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                        </div>

                        <div class="col">
                            <form id="delete-form-{{$item->id}}" action="/logbook/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="button" class="btn btn-danger btn-block btn-sm" value="Delete" onclick="confirmDelete({{$item->id}})">
                            </form>
                        </div>
                    </div>
                    @endif

                    <script>
                        function confirmDelete(itemId) {
                            if (confirm('Are you sure you want to delete this item?')) {
                                document.getElementById('delete-form-' + itemId).submit();
                            }
                        }
                    </script>


                    </div>
            </div>
        </div>

    @empty
        <h2>Belum Ada Postingan Logbook</h2>
    @endforelse

</div>

@endsection
