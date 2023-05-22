@extends('layout.master')

@section('content')
<input type="button" value="Edit" style="margin-left: 1100px;background-color: blue;width: 100px">
<h1>Profile</h1>

    <h3>Nama Pembimbing</h3>
    <p style="margin-left: 500px;margin-top: -30px ">Rahmat Sandhy</p>
</div>
<div class="bagian_profile">
    <h3>Nomor Wa Pembimbing</h3>
    <p style="margin-left: 500px;margin-top: -30px ">08123139419841</p>
</div>
<div class="bagian_profile">
    <h3>Surat Pengajuan</h3>
    <input type="file" name="fileToUpload" id="fileToUpload" style="margin-left: 500px;margin-bottom: -100px " >
</div>
<div class="bagian_profile">
    <h3>Nama</h3>
    <p style="margin-left: 500px;margin-top: -30px ">M.RIZKI ALFARISI</p>
</div>
<div class="bagian_profile">
    <h3>Nomor WA</h3>
    <p style="margin-left: 500px;margin-top: -30px ">082388506312</p>
</div>
<input type="button" value="Logout">

@endsection
