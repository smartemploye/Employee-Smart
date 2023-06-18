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
                                    <label for="inputKeteranganIzin" style="">Tanggal Selesai Magang</label>
                                </div>
                            <div class="col-9">
                                <input type="date" name="tanggal_mulai"
                                placeholder="Masukkan Keterangan" class="form-control  @error('tanggal_mulai') is-invalid @enderror" id="inputBirthdate" value="{{ $data->tanggal_mulai}}">
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
                                    placeholder="Masukkan Keterangan" class="form-control  @error('tanggal_selesai') is-invalid @enderror" id="inputBirthdate" value="{{ $data->tanggal_selesai}}">
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
                                    <select name="status_magang" id="" class="form-control @error('status_magang') is-invalid @enderror" name="status_magang">
                                        <option value="Seleksi" @if (old('status_magang') == "Seleksi") {{ 'selected' }} @endif>Seleksi</option>
                                        <option value="Belum Bayar" @if (old('status_magang') == "Belum Bayar") {{ 'selected' }} @endif>Belum Bayar</option>
                                        <option value="Aktif" @if (old('status_magang') == "Aktif") {{ 'selected' }} @endif>Aktif</option>
                                        <option value="Lulus" @if (old('status_magang') == "Lulus") {{ 'selected' }} @endif>Lulus</option>
                                        <option value="Drop Out" @if (old('status_magang') == "Drop Out") {{ 'selected' }} @endif>Drop Out</option>
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
                                </div>
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
                            <div class="form-group row ">
                                <div class="col-3">
                                    <label>Nama Pembimbing</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="" class="form-control"
                                        value="{{ $data->nama_pembimbing }}" disabled>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault(); confirmSubmit()">
                                Submit
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSubmit() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menyimpan perubahan?',
                text: "Anda tidak akan dapat mengembalikan perubahan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan perubahan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('form').submit();
                }
            })
        }
    </script>
@endsection
