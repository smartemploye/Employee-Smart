@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Perizinan</h6>
                @foreach ($perizinan as $data )
                <form method="POST" action="{{ route('izin_admin.update', $data->absen_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-top: 5px">Dari</label>
                        <div class="col-md-6">
                            <input type="date" name="izin_dari" class="form-control" value="{{ $data->izin_dari }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right" style="margin-left: 560px;margin-top: -50px">Sampai</label>
                        <div class="col-md-6">
                            <input type="date" style="margin-left: 650px;margin-top: -55px" name="izin_sampai" class="form-control" value="{{ $data->izin_sampai }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" style="margin-left: 100px;margin-top: -35px;width: 900px" value="{{ $data->keterangan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Approve</label>
                        <select name="approve" id="">
                            <option value="" selected selected>-Pilih-</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    <input type="text" hidden name="">
                    <button type="submit" class="btn btn-primary" onclick="event.preventDefault(); confirmSubmit()">
                      Submit
                  </button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Konfirmasi Submit',
            text: 'Apakah Anda yakin ingin submit data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Uncomment the following line to submit the form
                // document.forms[0].submit();
                document.querySelector('form').submit();
            }
        });
    }
</script>

@endsection
