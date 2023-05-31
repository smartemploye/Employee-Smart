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
<<<<<<< Updated upstream
    @foreach ($siswa as $data)
    <div class="foto" style="width: 200px; height: 250px; margin-left: 500px; margin-bottom: 50px;">
        <img src="{{ asset('image/fotosiswa/' . $data->foto_siswa) }}" style="width: 100%; height: 100%;" />
    </div>

=======
    
        <div class="foto">
            <img style="width: 200px;height: 250px;margin-left: 500px;margin-bottom: 50px" src="{{ asset('image/fotosiswa/'.$data->foto_siswa) }}">
>>>>>>> Stashed changes
            <div class="form-group row">
                <label for="inputNamaPeserta" class="col-sm-2 col-form-label">Nama Peserta</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNamaPeserta" name="nama_siswa"
                        placeholder="" value="{{ $data->nama_siswa }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNISN" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNISN" placeholder=""
                        value="{{ $data->nisn }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNomorWA" class="col-sm-2 col-form-label">Nomor WA</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNomorWA" placeholder=""
                        value="{{ $data->no_wa }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAsalSekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputAsalSekolah" placeholder=""
                        value="{{ $data->nama_sekolah }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputJurusan" placeholder=""
                        value="{{ $data->jurusan }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input disabled type="date" class="form-control" id="inputTanggalLahir" placeholder=""
                        value="{{ $data->tanggal_lahir }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIPPembimbing" class="col-sm-2 col-form-label">NIP Pembimbing</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNIPPembimbing" placeholder=""
                        value="{{ $data->nip }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNamaPembimbing" class="col-sm-2 col-form-label">Nama Pembimbing</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNamaPembimbing" placeholder=""
                        value="{{ $data->nama_pembimbing }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNomorPembimbing" class="col-sm-2 col-form-label">Nomor Pembimbing</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputNomorPembimbing" placeholder=""
                        value="{{ $data->no_wa_pembimbing }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSuratPengajuan" class="col-sm-2 col-form-label">Surat Pengajuan</label>
                <div class="col-sm-10">
                    <a href="{{ asset('surat_pengajuan/'.$data->surat_pengajuan) }}" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> {{ $data->surat_pengajuan }}</a>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAlamatEmail" class="col-sm-2 col-form-label">Alamat Email</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputAlamatEmail" placeholder=""
                        value="{{ $data->username }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="inputPassword" placeholder=""
                        value="{{ $data->password }}">
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
                                        <input type="hidden" name="username"value="{{ $data->username }}">
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
            <h4>Tidak Ada Postingan</h4>
            @endif

            <div class="form-group row">
                <label for="inputLogbook" class="col-sm-2 col-form-label">Logbook</label>
                <div class="col-sm-10">
                    <a href="/logbook/detail/{{$data->nisn}}"><button>Lihat</button></a>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPerizinan" class="col-sm-2 col-form-label">Perizinan</label>
                <div class="col-sm-10">
                    <a href="{{ route('peserta.izin', $data->id) }}"><button>Lihat</button></a>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAbsensi" class="col-sm-2 col-form-label">Absensi</label>
                <div class="col-sm-10">
                    <a href="/absensi"><button>Lihat</button></a>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputReportSertifikat" class="col-sm-2 col-form-label">Report dan Sertifikat</label>
                <div class="col-sm-10">
                    {{-- /tampilan/lihat/{{$data->nisn}} --}}
                    <a href=""><button>Lihat</button></a>
                </div>
            </div>
    
@endsection
