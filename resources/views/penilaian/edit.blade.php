@extends('layout.master')

@section('judul')
    Halaman Edit Penilaian
@endsection

@section('content')
    <style>
        table tr td {
            width: 20vw;
        }
    </style>
    <table>
        <tr>
            <td>
                Nama Siswa
            </td>
            <td>
                :
            </td>
            <td>
                <span>{{ $penilaian->nama_siswa }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <p>NISN </p>
            </td>
            <td>
                :
            </td>
            <td><span>{{ $penilaian->nisn }}</span></td>
        </tr>
        <tr>
            <td>
                <p>Nama Sekolah</p>
            </td>
            <td>:</td>
            <td> <span>{{ $penilaian->nama_sekolah }}</span></td>
        </tr>
        <tr>
            <td>
                <p>Judul Project </p>
            </td>
            <td>:</td>
            <td>
                <span>{{ $penilaian->judul_project }}</span>
            </td>
        </tr>
    </table>
    <form action="/penilaian/update/{{ $penilaian->id }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <?php foreach ($penilaian as $key => $item) {
            if ($key !== 'id' && $key !== 'nama_siswa' && $key !== 'id_penilaian' && $key !== 'id_siswa' && $key !== 'created_at' && $key !== 'updated_at' && $key !== '_token' && $key !== 'nisn' && $key !== 'nama_sekolah' && $key !== 'judul_project') {
                echo '<div class="form-group">
                                                                                                                                                                                            <label>' .
                    $key .
                    '</label>
                                                                                                                                                                                            <input type="text" name="' .
                    $key .
                    '" class="form-control" value="' .
                    $item .
                    '">
                                                                                                                                                                                        </div>';
            }
        } ?>

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
