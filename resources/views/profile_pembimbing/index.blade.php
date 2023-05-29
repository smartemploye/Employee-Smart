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
        <div class="form-group row">
            <label for="inputNamaPeserta" class="col-sm-2 col-form-label">Nama Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNamaPembimbing" name="nama_pembimbing"
                    placeholder="" value="{{ auth()->user()->pembimbing->nama_pembimbing }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Nomor WA Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNomorWaPembimbing" name="nomor_wa_pembimbing"
                    placeholder="" value="{{ auth()->user()->pembimbing->no_wa_pembimbing }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Nip Pembimbing</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputNomorWaPembimbing" name="nip_pembimbing"
                    placeholder="" value="{{ auth()->user()->pembimbing->nip_pembimbing }}">
            </div>
        </div>
        <td>
            <form action="{{ route('postpembimbing', auth()->user()->pembimbing->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputLaporanAkhir">Upload Format Laporan Akhir</label>
                    <input type="file" name="format_laporan_akhir" class="form-control-file @error('format_laporan_akhir') is-invalid @enderror" id="format_laporan_akhir" accept="pdf/*" value="{{ old('format_laporan_akhir') }}">
                    {{-- <div class="input-group-append">
                    </div> --}}
                    <button type="submit" style="margin-left: 300px;margin-top: -30px;position: absolute;"> Upload</button>
                    @error('format_laporan_akhir')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </td>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="inputPassword" placeholder=""
                    value="{{ auth()->user()->pembimbing->password }}">
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
                                    <input type="hidden" name="username"value="{{ auth()->user()->pembimbing->username }}">
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
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Mulai Magang</th>
                    <th scope="col">Tanggal Selesai Magang</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Judul Project</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($pembimbing as $siswa )
                    <td>{{$no++ }}</</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->tanggal_mulai }}</td>
                    <td>{{ $siswa->tanggal_selesai }}</td>
                    <td>{{ $siswa->status_magang }}</td>
                    <td>{{ $siswa->keterangan }}</td>
                    <td>{{ $siswa->nama_sekolah }}</td>
                    <td>{{ $siswa->judul_project }}</td>
                    <td><a href="{{ route('peserta.show', $siswa->siswa_id) }}" class="btn btn-warning" style="color: white"><i class='bx bx-zoom-in'></i> Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

@endsection
