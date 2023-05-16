@extends('layout.master')

@section('judul')
Halaman Data Table
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

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush

@if(isset($siswaData) && count($siswaData) > 0)
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>NISN</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status Magang</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswaData as $siswa)
        <tr>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->tanggal_mulai }}</td>
            <td>{{ $siswa->tanggal_selesai }}</td>
            <td>{{ $siswa->status_magang }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h1>Belum ada</h1>
@endif

@endsection