@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="mb-5 font-weight-bold text-primary">Edit Pembimbing</h6>
                @foreach ($pembimbing as $data )
                <form method="POST" action="{{ route('pembimbing.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nip Pembimbing</label>
                        <input type="number" class="form-control" name="nip_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nip_pembimbing }}">
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">Nama Pembimbing</label>
                        <input type="text" class="form-control" name="nama_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->nama_pembimbing }}">
                    </div>
                    <div class="form-group">
                        <label for="inputKeteranganIzin" style="">No Wa Pembimbing</label>
                        <input type="text" class="form-control" name="no_wa_pembimbing" placeholder="Masukkan Keterangan" style="margin-left: 200px;margin-top: -35px;width: 900px" value="{{ $data->no_wa_pembimbing }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="sekolah_id" style="width: 200px">Asal Sekolah</label>
                        </div>
                        <div class="col-9">
                            <select name="sekolah_id" id="" class="form-control" style="margin-left: 127px;width: 900px">
                                <option value="" selected>-Pilih Sekolah-</option>
                                @foreach ($sekolah as $sklh)
                                    <option value="{{ $sklh->id }}"
                                        {{ $sklh->id == $data->sekolah_id ? 'selected' : '' }}>
                                        {{ $sklh->nama_sekolah }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
            title: 'Apakah Anda yakin?',
            text: "Anda akan menyimpan perubahan ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('form').submit();
            }
        });
    }
</script>

@endsection
