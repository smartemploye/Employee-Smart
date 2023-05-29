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
                            <input type="text" value="{{ $data->nisn }}" hidden>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label class="form-label">Tanggal Mulai Magang</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" name="tanggal_mulai" class="form-control  @error('tanggal_mulai') is-invalid @enderror" id="inputBirthdate" value="{{ old('tanggal_mulai') }}">
                                    @error('tanggal_mulai')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputKeteranganIzin" style="">Tanggal Selesai Magang</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" name="tanggal_selesai"
                                    placeholder="Masukkan Keterangan" class="form-control  @error('tanggal_selesai') is-invalid @enderror" id="inputBirthdate" value="{{ old('tanggal_selesai') }}">
                                    @error('tanggal_selesai')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputKeteranganIzin">Status</label>
                                </div>
                                <div class="col-9">
                                    <select name="status_magang" id="" class="form-control">
                                        <option value="seleksi" selected>Seleksi</option>
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Lulus">Lulus</option>
                                        <option value="Drop Out">Drop Out</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="inputKeteranganIzin" style="margin-left: 10px;margin-top: 20px">Keterangan</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="keterangan" style="margin-left: 180px;margin-top: 10px;width: 240%"
                                            placeholder="Masukkan Keterangan" value="{{ $data->keterangan }}">
                                    </div>
                                </div>{{-- <input type="text" class="form-control" name="status_magang" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->status_magang }}"> --}}
                            </div>
                            <div class="form-group row" style="margin-top: -20px">
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
                            <input type="hidden" value="{{ $data->nisn }}" name="nisn">
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="inputNamaPembimbing" style="">Nama Pembimbing</label>
                                </div>
                                <div class="col-9">
                                    <select name="nip_pembimbing" id="">
                                        <option value="" selected>-Pilih Pembimbing-</option>
                                        @foreach ($pembimbing as $pbb)
                                            <option value="{{ $pbb->nip_pembimbing }}"
                                                {{ $pbb->nip_pembimbing == $data->nip ? 'selected' : '' }}>
                                                {{ $pbb->nama_pembimbing }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_pembimbing }}"> --}}
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
