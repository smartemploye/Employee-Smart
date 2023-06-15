{{-- @extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#siswa-table').DataTable();
                    });

                    function confirmDelete(url) {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            window.location.href = url;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
    <thead>
      <tr>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Search</label>
            <form action="/peserta" method="GET">
            <input type="text" class="form-control" value=""  placeholder="nis/nama" name="nama_siswa" style="width: 20%;margin-left: -15px">
            <p style="margin-left: -15px">Nama</p>
            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_mulai" style="width: 20%; margin-left: 270px; margin-top: -78px">
            <p style="margin-left: 270px">Tanggal Mulai</p>
            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_selesai" style="width: 20%;margin-left: 550px;margin-top: -78px">
            <p style="margin-left: 550px">Tanggal Selesai</p>
            <input type="text" class="form-control" value=""  placeholder="status" name="status_magang" style="width: 20%;margin-left: 820px;margin-top: -78px">
            <p style="margin-left: 820px">Status</p>
                <button style="margin-left: -15px">Tampilkan</button>
        </form>
        </div>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Mulai Magang</th>
        <th scope="col">Tanggal Selesai Magang</th>
        <th scope="col">Status</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Asal Sekolah</th>
        <th scope="col">Judul Project</th>
        <th scope="col">Nama Pembimbing</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($data as $dt)
        <tr>
            <td>{{$no++ }}</td>
            <td>{{$dt->nama_siswa}}</td>
            <td>{{$dt->tanggal_mulai }}</td>
            <td>{{$dt->tanggal_selesai }}</td>
            <td>{{$dt->status_magang }}</td>
            <td>{{$dt->keterangan }}</td>
            <td>{{$dt->nama_sekolah }}</td>
            <td>{{$dt->judul_project }}</td>
            <td>{{$dt->nama_pembimbing }}</td>
            <td><a href="{{ route('peserta.edit', $dt->id) }}" class="btn btn-success"><i class='bx bxs-pencil' style="width: 15px;height: 20px;"></i> Edit</a>
                <a href="javascript:void(0);" onclick="confirmDelete('{{ route('peserta.hapus', $dt->nisn) }}')" class="btn btn-danger"><i class='bx bxs-trash' style="width: 15px;height: 20px;"></i> Hapus</a>
                <a href="{{ route('peserta.show', $dt->id) }}" class="btn btn-warning" style="color: white;margin-left: 165px;margin-top: -65px;width: 80px;height: 35px;"></i> Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection --}}

@extends('layout.master')
{{-- @push('styles')
<style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
    }

    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
    </style>
@endpush --}}

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(document).ready(function () {
                        $('#siswa-table').DataTable();
                    });

                    function confirmDelete(url) {
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
                                window.location.href = url;
                            }
                        });
                    }

                    // function showDetail() {
                    //     Swal.fire({
                    //         icon: 'info',
                    //         title: 'Detail',
                    //         text: 'Tombol Detail ditekan',
                    //     });
                    // }

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
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="siswa-table">

                        <div class="form-group mx-sm-3 mb-2">
                            <label for="input" class="sr-only">Search</label>
                            <form action="/peserta" method="GET">
                            <input type="text" class="form-control" value=""  placeholder="nis/nama" name="nama_siswa" style="width: 20%;margin-left: -15px">
                            <p style="margin-left: -15px">Nama</p>
                            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_mulai" style="width: 20%; margin-left: 270px; margin-top: -78px">
                            <p style="margin-left: 270px">Tanggal Mulai</p>
                            <input type="date" class="form-control" value=""  placeholder="Search" name="tanggal_selesai" style="width: 20%;margin-left: 550px;margin-top: -78px">
                            <p style="margin-left: 550px">Tanggal Selesai</p>
                            <input type="text" class="form-control" value=""  placeholder="status" name="status_magang" style="width: 20%;margin-left: 820px;margin-top: -78px">
                            <p style="margin-left: 820px">Status</p>
                            <button style="margin-left: -15px">Tampilkan</button>
                        </form>
                        </div>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Mulai Magang</th>
                        <th scope="col">Tanggal Selesai Magang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Judul Project</th>
                        <th scope="col">Nama Pembimbing</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($data as $dt)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$dt->nama_siswa}}</td>
                        <td>{{$dt->tanggal_mulai }}</td>
                        <td>{{$dt->tanggal_selesai }}</td>
                        <td>{{$dt->status_magang }}</td>
                        <td>{{$dt->keterangan }}</td>
                        <td>{{$dt->nama_sekolah }}</td>
                        <td>{{$dt->judul_project }}</td>
                        <td>{{$dt->nama_pembimbing }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                <button type="button" class="btn btn-success" onclick="showEdit('{{ route('peserta.edit', $dt->id) }}')">
                                    <i class='bx bxs-pencil'></i> Edit
                                </button>
                                <a href="javascript:void(0);" onclick="confirmDelete('{{ route('peserta.hapus', $dt->nisn) }}')" class="btn btn-danger">
                                    <i class='bx bxs-trash'></i> Hapus
                                </a>
                                <a href="{{ route('peserta.show', $dt->id) }}" class="btn btn-warning">
                                    <i class='bx bx-detail'></i> Detail
                                </a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush

