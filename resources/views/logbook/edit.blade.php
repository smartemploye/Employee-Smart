@extends('layout.master')

@section('judul')
Halaman Edit Logbook
@endsection

@section('content')

<form action="/logbook/{{$logbook->id}}" method="POST" enctype="multipart/form-data" id="editForm">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Tanggal Logbook</label>
        <input type="date" name="tanggal_logbook" value="{{$logbook->tanggal_logbook}}" class="form-control">
    </div>
    @error('tanggal_logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Deskripsi Logbook</label>
        <textarea name="logbook" class="form-control" cols="30" rows="10">{{$logbook->logbook}}</textarea>
    </div>
    @error('logbook')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Dokumentasi</label>
        @if ($logbook->dokumentasi)
            <p>Dokumentasi saat ini: <a href="{{ asset('image/' . $logbook->dokumentasi) }}">{{ $logbook->dokumentasi }}</a></p>
        @else
            <p>Tidak ada dokumentasi saat ini</p>
        @endif
        <input type="file" name="dokumentasi" class="form-control">
    </div>

    @error('dokumentasi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="button" class="btn btn-primary" onclick="showSubmitConfirmation()">Submit</button>
</form>

<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>
    function showSubmitConfirmation() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan mengirimkan formulir ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit();
            }
        });
    }
</script>

@endsection
