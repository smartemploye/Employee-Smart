@extends('layout.master')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="foto">
        <img style="width: 300px;height: 250px;margin-left: 500px;margin-bottom: 50px" src="{{ asset('image/fotosiswa/'.$siswa->foto_siswa) }}">
        <div class="form-group row">
            <label for="inputNamaPeserta" class="col-sm-2 col-form-label">Nama Peserta</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNamaPeserta" name="nama_siswa"
                    placeholder="" value="{{ $siswa->nama_siswa }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNISN" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNISN" placeholder=""
                    value="{{ $siswa->nisn }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNomorWA" class="col-sm-2 col-form-label">Nomor WA</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNomorWA" placeholder=""
                    value="{{ $siswa->no_wa }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAsalSekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputAsalSekolah" placeholder=""
                    value="{{ $siswa->nama_sekolah }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputJurusan" placeholder=""
                    value="{{ $siswa->jurusan }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input disabled type="date" class="form-control" id="inputTanggalLahir" placeholder=""
                    value="{{ $siswa->tanggal_lahir }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNIPPembimbing" class="col-sm-2 col-form-label">NIP Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNIPPembimbing" placeholder=""
                    value="{{ $siswa->nip }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNamaPembimbing" class="col-sm-2 col-form-label">Nama Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNamaPembimbing" placeholder=""
                    value="{{ $siswa->nama_pembimbing }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNomorPembimbing" class="col-sm-2 col-form-label">Nomor Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNomorPembimbing" placeholder=""
                    value="{{ $siswa->no_wa_pembimbing }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSuratPengajuan" class="col-sm-2 col-form-label">Surat Pengajuan</label>
            <div class="col-sm-10">
                <a href="{{ asset('surat_pengajuan/'.$siswa->surat_pengajuan) }}" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> {{ $siswa->surat_pengajuan }}</a>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAlamatEmail" class="col-sm-2 col-form-label">Alamat Email</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputAlamatEmail" placeholder=""
                    value="{{ $siswa->username }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputPassword" placeholder=""
                    value="{{ $siswa->password }}">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ganti Password
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
                    data-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="/changepassword" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group row">
                                        <label for="confpassword" class="form-label">Confirm Password Baru</label>
                                        <input type="text" name="confpassword" class="form-control">
                                    </div>
                                    <input type="hidden" name="username"value="{{ $siswa->username }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($gambar)
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Bukti VA</label>
            <div class="col-4">
                <div class="card">
                    <img src="{{asset('image/' . $gambar)}}" class="card-img-top" alt="Bukti VA">
                </div>
            </div>
        </div>
        @else
        <h2>Tidak Ada Postingan</h2>
        @endif

<<<<<<< HEAD
=======
        <div class="form-group row">
            @if (Auth::user()->role != 'siswa')
                <label for="inputLogbook" class="col-sm-2 col-form-label">Logbook</label>
            @endif
            <div class="col-sm-10">
                @if (Auth::user()->role != 'siswa')
                    <a href="/logbook"><button>Lihat</button></a>
                @endif
            </div>
        </div>
        <div class="form-group row">
            @if (Auth::user()->role != 'siswa')
                <label for="inputPerizinan" class="col-sm-2 col-form-label">Perizinan</label>
            @endif
            <div class="col-sm-10">
                @if (Auth::user()->role != 'siswa')
                    <a href="{{ route('peserta.izin', $siswa->id) }}"><button>Lihat</button></a>
                @endif
            </div>
        </div>
        <div class="form-group row">
            @if (Auth::user()->role != 'siswa')
                <label for="inputAbsensi" class="col-sm-2 col-form-label">Absensi</label>
            @endif
            <div class="col-sm-10">
                @if (Auth::user()->role != 'siswa')
                    <a href="/absensi"><button>Lihat</button></a>
                @endif
            </div>
        </div>
        <div class="form-group row">
            @if (Auth::user()->role != 'siswa')
                <label for="inputReportSertifikat" class="col-sm-2 col-form-label">Report dan Sertifikat</label>
            @endif
            <div class="col-sm-10">
                @if (Auth::user()->role != 'siswa')
                    <a href="/report"><button>Lihat</button></a>
                @endif
            </div>
        </div>
        

>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
@endsection
