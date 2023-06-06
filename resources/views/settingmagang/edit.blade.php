@extends('layout.master')

@section('judul')
Edit Setting Magang
@endsection

@section('content')

<form action="/settingmagang/{{$settingmagang->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- Jam masuk kerja --}}
    <div class="form-group row">
        <label for="inputJamKerja" class="col-sm-2 col-form-label">Jam Masuk Kerja</label>
        <div class="col-sm-10">
          <input type="time" name="jam_Masuk_kerja" value="{{$settingmagang->jam_Masuk_kerja}}" class="form-control" id="inputJamKerja" placeholder="Jam Kerja">
        </div>
      </div>
      @error('jam_Masuk_kerja')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Jam Pulang Kerja --}}  
      <div class="form-group row">
        <label for="inputJamKerja" class="col-sm-2 col-form-label">Jam Pulang Kerja</label>
        <div class="col-sm-10">
          <input type="time" name="jam_Pulang_kerja" value="{{$settingmagang->jam_Pulang_kerja}}" class="form-control" id="inputJamKerja" placeholder="Jam Kerja">
        </div>
      </div>
      @error('jam_Pulang_kerja')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Nomor VA --}}  
      <div class="form-group row">
        <label for="inputNomorVA" class="col-sm-2 col-form-label">Nomor Rekening</label>
        <div class="col-sm-10">
          <input type="text" name="no_va" value="{{$settingmagang->no_va}}" class="form-control" id="inputNomorVA" placeholder="Nomor VA">
        </div>
      </div>
      @error('no_va')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    {{-- Kuota Magang --}}
      <div class="form-group row">
          <label for="inputKuota Magang" class="col-sm-2 col-form-label">Kuota Magang</label>
          <div class="col-sm-10">
            <input type="text" name="Kuota_Magang" value="{{$settingmagang->Kuota_Magang}}" class="form-control" id="inputKuotaMagang" placeholder="Isi Kuota">
          </div>
        </div>
        @error('Kuota_Magang')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
    {{-- Format Konfirmasi WA siswa--}}
        <div class="form-group row">
          <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Konfirmasi WA Siwa</label>
          <div>
              <p style="margin-left: -180px;margin-top: 35px">Format Diterima</p>
              <textarea name="Format_WA_Diterima" class="form-control" cols="30" rows="10" id="inputFormatDiterima" placeholder="Format Diterima" style="margin-left: -150px;margin-top: -10px;resize: none;width: 500px">{{$settingmagang->Format_WA_Diterima}}</textarea>
              {{-- <input type="file" class="form-control" id="inputFormatDiterima " placeholder="Format Diterima" style="margin-left: 130px;margin-top: -50px"> --}}
            <p style="margin-left: 360px;margin-top: -285px">Format Ditolak</p>
              <textarea name="Format_WA_Ditolak" class="form-control" cols="30" rows="10" id="inputFormatDitolak" placeholder="Format Ditolak" style="margin-left: 390px;margin-top: -10px;resize: none;width: 500px">{{$settingmagang->Format_WA_Ditolak}}</textarea>
              {{-- <input type="file" class="form-control" id="inputFormatDitolak" placeholder="Format Ditolak" style="margin-left: 130px;margin-top: -40px"> --}}
          </div>
        </div>
  
   {{-- Format Konfirmasi WA Pembimbing      --}}
          <div class="form-group row">
          <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">WA Pembimbing</label>
          <div>
              <p style="margin-left: -180px;margin-top: 35px">Format Pembimbing</p>
              <textarea name="Format_Pembimbing" class="form-control" cols="30" rows="10" id="inputFormatDiterima" placeholder="Format Diterima" style="margin-left: -150px;margin-top: -10px;resize: none;width: 500px">{{$settingmagang->Format_Pembimbing}}</textarea>
              {{-- <input type="file" class="form-control" id="inputFormatDiterima " placeholder="Format Diterima" style="margin-left: 130px;margin-top: -50px"> --}}
          
          </div>
        </div>


        {{-- Format Konfirmasi Email --}}
        <div class="form-group row"> 
          <label for="inputFormat Konfirmasi WA" class="col-sm-2 col-form-label">Format Konfirmasi Email</label>
          <div>
              <p style="margin-left: -180px;margin-top: 35px">Format Email</p>
            <textarea name="Format_Email" class="form-control" cols="30" rows="10" id="inputFormatDiterima" placeholder="Format Email" style="margin-left: -150px;margin-top: -10px;resize: none;width: 500px">{{$settingmagang->Format_Email}}</textarea>
            {{-- <input type="file" class="form-control" id="inputFormatEmail" placeholder="Format Email" style="margin-left: 130px;margin-top: -50px"> --}}
            </div>
        </div>
        @error('Format_Email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  
        {{-- Nomor WA Kantor --}}
        <div class="form-group row">
          <label for="inputNomorWAKantor" class="col-sm-2 col-form-label">Nomor WA Kantor</label>
          <div class="col-sm-10">
            <input type="text" name="WA_Kantor" value="{{$settingmagang->WA_Kantor}}" class="form-control" id="inputNomorWAKantor" name= "inputNomorWAKantor" placeholder="Nomor Wa Kantor">
          </div>
        </div>
        @error('WA_Kantor')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- Sertifikat --}}
        <div class="form-group row">
          <label for="Sertifikat" class="col-sm-2 col-form-label">Upload Sertifikat</label>
          <div class="col-sm-10">
            <input type="file" id="Sertifikat" name="Sertifikat" >
          </div>
        </div>
        @error('Sertifikat')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        <button type="button" class="btn btn-primary" onclick="showEditConfirmation()">Submit</button>


</form> 

<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>
    function showEditConfirmation() {
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
                // Tambahkan logika atau tindakan yang ingin Anda lakukan setelah tombol Edit ditekan
                // Contoh: redirect ke halaman edit atau jalankan fungsi lainnya
                document.querySelector('form').submit();
            }
        });
    }
</script>

@endsection