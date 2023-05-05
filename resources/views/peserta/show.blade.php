@extends('layout.master')

@section('content')
    @foreach ($siswa as $data)
        <div class="foto">
            <img src="" style="width: 200px;height: 250px;margin-left: 500px;margin-bottom: 50px">
        <div class="form-group row">
            <label for="inputNamaPeserta" class="col-sm-2 col-form-label">Nama Peserta</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNamaPeserta" name="nama_siswa" placeholder=""
                    value="{{ $data->nama_siswa }}">
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
                {{-- <input type="text" class="form-control" id="inputNamaPeserta" placeholder=""> --}}
                <input type="button" value="Download.pdf">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAlamatEmail" class="col-sm-2 col-form-label">Alamat Email</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputAlamatEmail" placeholder="" value="{{ $data->username }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" placeholder="" value="{{ Crypt::decrypt($data->password) }}">
                <input type="button" value="Ganti Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLogbook" class="col-sm-2 col-form-label">Logbook</label>
            <div class="col-sm-10">
                <a href="/logbook"><button>Lihat</button></a>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPerizinan" class="col-sm-2 col-form-label">Perizinan</label>
            <div class="col-sm-10">
                <a href="/perizinan"><button>Lihat</button></a>
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
                <a href="/report"><button>Lihat</button></a>
            </div>
        </div>
    @endforeach
@endsection
