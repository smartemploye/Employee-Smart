@extends('layout.master')

@section('judul')
    Halaman Penilaian
@endsection

@section('content')
    <form action="/penilaian/update/{{ $penilaian->id }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <?php foreach ($penilaian as $key => $item) {
            if ($key !== 'id' && $key !== 'nama_siswa' && $key !== 'id_penilaian' && $key !== 'id_siswa' && $key !== 'created_at' && $key !== 'updated_at' && $key !== '_token') {
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
