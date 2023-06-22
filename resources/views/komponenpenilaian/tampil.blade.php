@extends('layout.master')

@section('judul')
    Halaman Komponen Penilaian
@endsection

@section('content')

@push('scripts')

<script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>
@endpush
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
    @push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    @endpush
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col" class="text-center">Nama Komponen</th>
                <th scope="col" class="text-center">Persentase</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($komponenpenilaian as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td class="text-center">{{ $value->nama_komponen }}</td>
                    <td class="text-center">{{ $value->presentase }}</td>
                    <td class="text-center">

                        {{-- <form action="/komponenpenilaian/{{ $value->id }}" method="POST"> --}}
                        <form id="deleteForm{{ $value->id }}" action="/komponenpenilaian/{{ $value->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/komponenpenilaian/{{ $value->id }}" class="btn btn-info btn-sm">Detail</a>
                            {{-- <a href="/komponenpenilaian/{{ $value->id }}}/edit" class="btn btn-warning btn-sm">Edit</a> --}}
                            {{-- <button type="button" class="btn btn-warning btn-sm" onclick="showEditConfirmation()">Edit</button>  --}}
                            <button type="button" class="btn btn-warning btn-sm" onclick="showEditConfirmation('{{ $value->id }}')">Edit</button>
                            {{-- <input type="submit" value="Delete" class="btn btn-danger btn-sm"> --}}
                            <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteConfirmation('{{ $value->id }}')">Delete</button>
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
    </div>
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
                    window.location.href = "/komponenpenilaian/" + id + "/edit";
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
