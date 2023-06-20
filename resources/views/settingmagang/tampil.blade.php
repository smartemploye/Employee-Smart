@extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')
@push('scripts')

<script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });

    function showEdit(url) {
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
                                window.location.href = url;
                            }
                        });
                    }
</script>
@endpush

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Pulang</th>
            <th scope="col">Nomor Rekening</th>
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
                    <button type="button" class="btn btn-warning btn-sm" onclick="showEdit('/settingmagang/{{$value->id}}/edit')">Edit</button>
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
