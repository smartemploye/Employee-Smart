@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Sekolah</h6>
                <form method="POST" action="{{ route('sekolah.store') }}">
                    @csrf
                    @method('PUT')
                    <tr>
                        <th scope="col" style="width:30%">Nis</th>
                        <th><input type="number"name="status_magang"
                                placeholder="Masukkan Nis" class="form-control"></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width:30%">Nama Sekolah</th>
                        <th><input type="text"name="nama_sekolah"
                                placeholder="Masukkan Nama Sekolah" class="form-control"></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width:30%">Alamat Sekolah</th>
                        <th><input type="text"name="alamat_sekolah"
                                placeholder="Masukkan Alamat Sekolah" class="form-control">
                        </th>
                    </tr>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
@endsection
