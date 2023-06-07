@extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Pulang</th>
            <th scope="col">Nomor Rekening</th>
            <th scope="col">Kuota Magang</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($settingmagang as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->jam_Masuk_kerja}}</td>
            <td>{{$value->jam_Pulang_kerja}}</td>
            <td>{{$value->no_va}}</td>
            <td>{{$value->Kuota_Magang}}</td>
            <td>

                <form action="/settingmagang/{{$value->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/settingmagang/{{$value->id}}" class="btn btn-info btn-sm" onclick="showDetailConfirmation()">Detail</a>
                    {{-- <a href="/settingmagang/{{$value->id}}/edit" class="btn btn-warning btn-sm" onclick="showEditConfirmation()">Edit</a> --}}
                    <button type="button" class="btn btn-warning btn-sm" onclick="showEditConfirmation()">Edit</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>Tidak Ada Data</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>
    function showEditConfirmation() {
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
                // Tambahkan logika atau tindakan yang ingin Anda lakukan setelah tombol Edit ditekan
                // Contoh: redirect ke halaman edit atau jalankan fungsi lainnya
                window.location.href = "/settingmagang/{{$value->id}}/edit";
            }
        });
    }
</script>


@endsection
