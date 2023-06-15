@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

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
        <div class="col-4 mb-4">
            <div class="card h-100">
                <img src="{{asset('image/' . $item->dokumentasi)}}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                <div class="card-body d-flex flex-column">
                    <h3>{{$item->tanggal_logbook}}</h3>
                    {{-- <span class="badge badge-info">{{$item->kategori->nama}}</span> --}}
                    <p class="card-text">{{ Str::limit($item->logbook, 50) }}</p>

                    <a href="/logbook/{{$item->id}}" class="btn btn-secondary mt-auto">Lihat Selengkapnya</a>
                    {{-- @auth --}}
                        @if (Auth::user()->role == 'siswa')
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
                        @endif


                {{-- @endauth --}}
                </div>
            </div>
        </div>
    @empty
        <h2>Belum Ada Postingan Logbook</h2>
    @endforelse
</div>

<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>
    function showEditConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan mengedit data ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman edit dengan mengganti id
                window.location.href = "/logbook/" + id + "/edit";
            }
        });
    }

    function showDeleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form untuk menghapus data
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }

</script>

@endsection
