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
    <script>
        $(document).ready(function () {
            $('#absen-table').DataTable();
        });

        function confirmDelete(url) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = url;
            }
        }
    </script>
   <div class="col-9" >
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
                            <img src="{{ asset('image/dokumentasi/'.$izin->dokumentasi) }}">
                        </td>
                        <td>{{$izin->approve }}</td>
                        <td>
                            <a href="{{ route('izin_admin.edit', $izin->id) }}" class="btn btn-success">
                            <i class='bx bxs-pencil' ></i> Edit</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
  </table>
@endsection
