@extends('layout.master')

@section('content')
    <style>
        td:first-child {
            width: 45%;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Peserta</h6>
                    <form method="POST" action="{{ route('peserta.store') }}">
                        @csrf
                        @method('PUT')

                        <table class="table w-100" >
                            <thead>
                                <tr>
                                    <th scope="col" style="width:30%">Nama</th>
                                    <th scope="col" style="width:30%;"><input type="text" name="nama_siswa" placeholder="Masukkan Nama" class="form-control"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col" style="width:30%"> Tanggal Mulai Magang</th>
                                    <th scope="col" style="width:30%;"><input type="date" name="tanggal_mulai" class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="width:30%">Tanggal Selesai Magang</th>
                                    <th scope="col" style="width:30%;"><input type="date" name="tanggal_selesai" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" style="width:30%">Status</th>
                                    <th><input type="text"name="status_magang"
                                            placeholder="Masukkan Status" class="form-control"></th>
                                </tr>
                                <tr>
                                    <th scope="col" style="width:30%">Asal Sekolah</th>
                                    <th><input type="text"name="nama_sekolah"
                                            placeholder="Masukkan Asal Sekolah" class="form-control"></th>
                                </tr>
                                <tr>
                                    <th scope="col" style="width:30%">Judul Project</th>
                                    <th><input type="text"name="judul_project"
                                            placeholder="Masukkan Judul Project" class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="width:30%">Nama Pembimbing</th>
                                    <th><input type="text"name="nama_pembimbing"
                                            placeholder="Masukkan Nama Pembimbing" class="form-control">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            @endsection
