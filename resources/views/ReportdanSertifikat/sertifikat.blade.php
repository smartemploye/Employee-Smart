<div>  
{{-- <img src="{{asset('image/' . $settingMagang->Sertifikat)}}" class="card-img-top" alt="..."> --}}
<img src="{{ public_path(). '/image/' . $settingMagang->Sertifikat }}">
{{ public_path().'/image/' . $settingMagang->Sertifikat}}
{{$siswa->nama_siswa}}
</div>