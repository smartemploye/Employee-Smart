@extends('layout.master')

@section('content')
    <style>
        td:first-child {
            width: 25%;
        }

        .w-20 {
            width: 20% !important;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg w-100" style="width: 18rem;">
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-lg-2">
                            <div class="input-group">
                                <button class="btn-block btn-danger rounded"><i class='bx bx-pencil'></i> Edit</button>
                            </div>
                        </div>
                    </div>

                    <h5 class="card-title">Profile</h5> <br>
                    <hr>
                    <table class="w-100 table no-border">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td class="w-20"> </td>
                                <td>M.RIZKI ALFARISI</td>
                            </tr>
                            <tr>
                                <td> Email</td>
                                <td class="w-20"> </td>
                                <td>riskialfarisi2000@gmail.com</td>
                            </tr>
                            <tr>
                                <td> Password</td>
                                <td class="w-20"> </td>
                                <td>**********</td>
                            </tr>
                            <tr>
                                <td> Asal Sekolah</td>
                                <td class="w-20"> </td>
                                <td>SMK 5 Pekanbaru</td>
                            </tr>
                            <tr>
                                <td> Jurusan</td>
                                <td class="w-20"> </td>
                                <td>Teknik Komputer Jaringan</td>
                            </tr>
                            <tr>
                                <td> NIP Pembimbing</td>
                                <td class="w-20"> </td>
                                <td>193821398440</td>
                            </tr>
                            <tr>
                                <td> Nama Pembimbing</td>
                                <td class="w-20"> </td>
                                <td>Rahmat Sandhy</td>
                            </tr>
                            <tr>
                                <td> Nomor Wa Pembimbing</td>
                                <td class="w-20"> </td>
                                <td>08123139419841</td>
                            </tr>
                            <tr>
                                <td> Surat Pengajuan</td>
                                <td class="w-20"> </td>
                                <td><input type="file" name="fileToUpload" id="fileToUpload" class="form-control"></td>
                            </tr>
                            <tr>
                                <td> Nomor WA</td>
                                <td class="w-20"> </td>
                                <td>
                                    <p>082388506312</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-lg-2">
                            <button class="btn-block btn-primary rounded"><i class='bx bx-log-out'></i> Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div>

    </div>
    <h1>Profile</h1>
    <div class="bagian_profile">
        <h3>Nama</h3>
        <p style="margin-left: 500px;margin-top: -30px ">M.RIZKI ALFARISI</p>
    </div>
    <div class="bagian_profile">
        <h3>Email</h3>
        <p style="margin-left: 500px;margin-top: -30px ">riskialfarisi2000@gmail.com</p>
    </div>
    <div class="bagian_profile">
        <h3>Password</h3>
        <p style="margin-left: 500px;margin-top: -30px ">**********</p>
    </div>
    <div class="bagian_profile">
        <h3>Asal Sekolah</h3>
        <p style="margin-left: 500px;margin-top: -30px ">SMK 5 Pekanbaru</p>
    </div>
    <div class="bagian_profile">
        <h3>Jurusan</h3>
        <p style="margin-left: 500px;margin-top: -30px ">Teknik Komputer Jaringan</p>
    </div>
    <div class="bagian_profile">
        <h3>NIP Pembimbing</h3>
        <p style="margin-left: 500px;margin-top: -30px ">193821398440</p>
    </div>
    <div class="bagian_profile">
        <h3>Nama Pembimbing</h3>
        <p style="margin-left: 500px;margin-top: -30px ">Rahmat Sandhy</p>
    </div>
    <div class="bagian_profile">
        <h3>Nomor Wa Pembimbing</h3>
        <p style="margin-left: 500px;margin-top: -30px ">08123139419841</p>
    </div>
    <div class="bagian_profile">
        <h3>Surat Pengajuan</h3>
        <input type="file" name="fileToUpload" id="fileToUpload" style="margin-left: 500px;margin-bottom: -100px ">
    </div>
    <div class="bagian_profile">
        <h3>Nama</h3>
        <p style="margin-left: 500px;margin-top: -30px ">M.RIZKI ALFARISI</p>
    </div>
    <div class="bagian_profile">
        <h3>Nomor WA</h3>
        <p style="margin-left: 500px;margin-top: -30px ">082388506312</p>
    </div>
    <input type="button" value="Logout"
        style="margin-left:1100px; background-color: rgb(30, 186, 59);color: white;width: 90px;border-radius: 20px"> --}}
@endsection
