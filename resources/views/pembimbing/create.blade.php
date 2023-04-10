@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-12">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pembimbing</h6>
                <form method="POST" action="{{ route('pembimbing.store') }}">
                    @csrf
                    @method('PUT')
                    <table class="table w-100" >
                        <thead>
                            <tr>
                                <th scope="col" style="width:30%">Nip Pembimbing</th>
                                <th scope="col" style="width:30%;"><input type="text" name="nip_pembimbing" placeholder="Masukkan Nip" class="form-control"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col" style="width:30%">Nama Pembimbing</th>
                                <th scope="col" style="width:30%;"><input type="text" name="nama_pembimbing" class="form-control" placeholder="Masukkan Nama Pembimbing">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" style="width:30%">No Wa Pembimbing</th>
                                <th scope="col" style="width:30%;"><input type="text" name="no_wa_pembimbing" class="form-control" placeholder="Masukkan Nomor Wa Pembimbing">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" style="width:30%">Asal Sekolah</th>
                                <th><input type="text"name="sekolah-id"
                                        placeholder="Masukkan Asal Sekolah" class="form-control"></th>
                            </tr>
                        </tbody>
                    </table>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
@endsection
