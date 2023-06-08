@extends('layout.master')
@section('nama_profile')

@endsection
@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Perizinan</h6>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(document).ready(function () {
                        $('#absen-table').DataTable();
                    });

                    function confirmDelete(url) {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            window.location.href = url;
                        }
                    }

                    function confirmEdit(url) {
                        Swal.fire({
                            title: 'Konfirmasi Edit',
                            text: 'Apakah Anda yakin ingin mengedit data ini?',
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
            </div>
            <div class="col-9">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Dari</th>
                        <th scope="col">Sampai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Dokumentasi</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($perizinan as $izin)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$izin->izin_dari}}</td>
                        <td>{{$izin->izin_sampai }}</td>
                        <td>{{$izin->keterangan }}</td>
                        <td>
                            <img width="300px" src="{{ asset('image/dokumentasi/'.$izin->dokumentasi) }}">
                        </td>
                        <td>{{$izin->approve }}</td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmEdit('{{ route('izin_admin.edit', $izin->id) }}')" class="btn btn-success">
                                <i class='bx bxs-pencil' ></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
