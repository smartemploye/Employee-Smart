@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-12">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jurusan</h6>
                <form method="POST" action="{{ route('bidang.store') }}">
                    @csrf
                    <table class="table w-100" >
                        <thead>
                            <tr>
                                <th scope="col" style="width:30%">Nama Jurusan</th>
                                <th scope="col" style="width:30%;"><input type="text" name="nama_bidang" placeholder="Masukkan Nama Bidang" class="form-control"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col" style="width:30%">Jenis Jurusan</th>
                                <th scope="col" style="width:30%;">
                                <select name="jenis_jurusan" id="">
                                    <option value="IT">IT</option>
                                    <option value="Umum">Umum</option>
                                </select>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
@endsection
