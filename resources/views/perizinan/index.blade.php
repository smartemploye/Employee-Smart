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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                <script>
                    $(document).ready(function () {
                        $('table').DataTable();
                    });

                    function confirmDelete(url) {
                        Swal.fire({
                            title: 'Apakah Anda yakin ingin menghapus data ini?',
                            text: "Anda tidak akan dapat mengembalikan data ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus data!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                    }
                    
                </script>
            </div>
            <div class="col-9">
                <a class="btn btn-success fa-pull-right" href="{{ route('perizinan.create') }}">
                    <i class='bx bx-plus text-white'></i>
                    {{-- <i  class="text-white"><box-icon name='plus'></box-icon></i> --}}
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {{-- @foreach ($izin as $nama )
            {{ $nama->nama_siswa }}
            @endforeach --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Dari</th>
                        <th scope="col">Sampai</th>
                        <th scope="col">Dokumentasi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($perizinan as $izin)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$izin->izin_dari}}</td>
                        <td>{{$izin->izin_sampai }}</td>
                        <td>
                            <img width="300px" src="{{ asset('image/dokumentasi/'.$izin->dokumentasi) }}">
                        </td>

                        <td>{{$izin->keterangan }}</td>
                        <td>{{$izin->approve }}</td>
                        <td>
                            {{-- <a href="{{ route('perizinan.edit', $izin->id) }}" class="btn btn-success">
                            <i class='bx bxs-pencil' ></i> Edit</a> --}}
                            <a href="javascript:void(0);" onclick="confirmDelete('{{ route('perizinan.hapus', $izin->id) }}')" class="btn btn-danger">
                                <i class='bx bxs-trash' style="width: 15px;height: 20px;"></i> Hapus
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
