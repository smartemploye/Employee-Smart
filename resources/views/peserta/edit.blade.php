@extends('layout.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="mb-3 font-weight-bold text-primary">Edit Peserta</h6>
                    @foreach ($siswa as $data)
                        <form method="POST" action="{{ route('peserta.update', $data->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row ">
                                <div class="col-3">
                                    <label>Nama</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="nama_siswa" class="form-control"
                                        value="{{ $data->nama_siswa }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label class="form-label">Tanggal Mulai Magang</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" name="tanggal_mulai" class="form-control"
                                        value="{{ $data->tanggal_mulai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">1
                                    <label for="inputKeteranganIzin" style="">Tanggal Selesai Magang</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" class="form-control" name="tanggal_selesai"
                                        placeholder="Masukkan Keterangan" value="{{ $data->tanggal_selesai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputKeteranganIzin">Status</label>
                                </div>
                                <div class="col-9">
                                    <select name="status_magang" id="" class="form-control">
                                        <option value="TIdak Aktif">Seleksi</option>
                                        <option value="TIdak Aktif">Belum Bayar</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="TIdak Aktif">Lulus</option>
                                        <option value="TIdak Aktif">Drop Out</option>
                                    </select>
                                </div>
                                {{-- <input type="text" class="form-control" name="status_magang" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->status_magang }}"> --}}
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="sekolah_id">Asal Sekolah</label>
                                </div>
                                <div class="col-9">
                                    <select name="sekolah_id" id="" class="form-control">
                                        <option value="" selected>-Pilih Sekolah-</option>
                                        @foreach ($sekolah as $sklh)
                                            <option value="{{ $sklh->id }}"
                                                {{ $sklh->id == $data->id_sekolah ? 'selected' : '' }}>
                                                {{ $sklh->nama_sekolah }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px"value="{{ $data->nama_sekolah }}"> --}}
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputKeteranganIzin" style="">Judul Project</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="judul_project"
                                        placeholder="Masukkan Keterangan" value="{{ $data->judul_project }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputNamaPembimbing" style="">Nama Pembimbing</label>
                                </div>
                                <div class="col-9">
                                    <select name="nip_pembimbing" id="">
                                        <option value="" selected>-Pilih Pembimbing-</option>
                                        @foreach ($pembimbing as $pbb)
                                            <option value="{{ $pbb->id }}"
                                                {{ $pbb->nip_pembimbing == $data->nip ? 'selected' : '' }}>
                                                {{ $pbb->nama_pembimbing }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_pembimbing }}"> --}}
                            </div>
                </div>
                <input type="text" hidden name="">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
            </div>
        @endsection
