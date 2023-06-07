@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-5 font-weight-bold text-primary">Edit Sekolah</h6>
                @foreach ($sekolah as $data )
                <form id="editForm" method="POST" action="{{ route('sekolah.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">NPSN</label>
                        <input type="text" class="form-control" name="nis" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_sekolah }}">
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Alamat Sekolah</label>
                        <input type="text" class="form-control" name="alamat_sekolah" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->alamat_sekolah }}">
                    </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary" onclick="confirmSubmit(event)">Submit</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmSubmit(event) {
        event.preventDefault(); // Prevent form submission
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan mengedit data ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit(); // Submit the form
            }
        });
    }
</script>

@endsection
