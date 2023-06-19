@extends('layout.master')

@section('judul')
Halaman Logbook
@endsection

@section('content')

@if (Auth::user()->role == 'siswa')
<a href="/logbook/create" class="btn btn-primary btn-sm mb-3">Tambah Logbook</a>
@endif

@push('scripts')

<script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });

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
@endpush

@push('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush
<div class="row">
    <div class="col-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Logbook</th>
                    <th class="text-center">Logbook</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logbook as $item)
                <tr>
                    <td>{{$item->tanggal_logbook}}</td>
                    <td>{{ Str::limit($item->logbook, 110) }}</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="/logbook/{{$item->id}}" class="btn btn-secondary btn-sm">Lihat Selengkapnya</a>
                            @if (Auth::user()->role == 'siswa')
                            <button type="button" class="btn btn-info btn-sm" onclick="showEditConfirmation('{{ $item->id }}')">Edit</button>
                            <form id="deleteForm{{ $item->id }}" action="/logbook/{{ $item->id }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteConfirmation('{{ $item->id }}')">Delete</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Postingan Logbook</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
