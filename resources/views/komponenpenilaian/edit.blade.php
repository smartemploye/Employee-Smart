@extends('layout.master')

@section('judul')
Halaman Edit Penilaian
@endsection

@section('content')

<form action="/komponenpenilaian/{{$komponenpenilaian->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Nama Komponen</label>
      <input type="text" name="nama_komponen" class="form-control" value="{{$komponenpenilaian->nama_komponen}}">
    </div>
    @error('nama_komponen')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Presentase</label>
        <input type="number" name="presentase" class="form-control" value="{{$komponenpenilaian->presentase}}">
      </div>
      @error('presentase')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

            <button type="button" class="btn btn-primary" onclick="showEditConfirmation()">Submit</button>

  </form>

  <script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>
    function showEditConfirmation() {
        Swal.fire({
            icon: 'info',
            title: 'Edit Confirmation',
            text: 'Apakah Anda yakin ingin menyimpan perubahan ini?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
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