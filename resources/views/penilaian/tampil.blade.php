@extends('layout.master')

@section('judul')
    Halaman Penilaian
@endsection

@section('content')
    @push('scripts')
        <script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script>
            $(function() {
                $("#example1").DataTable();
            });
        </script>
    @endpush

    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    @endpush

    <table id="example1" class="table table-bordered table-striped">
        {{-- <table class="table"> --}}

        <thead>
            <tr>
                <th scope="col" rowspan="2">No</th>
                <th scope="col" rowspan="2">Nama</th>
                <th scope="col" colspan="<?= count($komponen) ?>" style="text-align: center;">Penilaian</th>
                <th scope="col" rowspan="2" style="text-align: center;">Action</th>
            </tr>
            <tr>
                <?php foreach ($komponen as $key) {
                    echo '<th>' . $key->nama_komponen . '(' . $key->presentase . '%)' . '</th>';
                } ?>
            </tr>
        </thead>
        <tbody>

            @forelse ($penilaian as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_siswa }}</td>
                    <?php foreach($komponen as $item): ?>
                    <?php $data = $item->nama_komponen; ?>
                    <td>{{ $value->$data }}</td>
                    <?php endforeach?>
                    <td>
                        <form action="/penilaian/{{ $value->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="/penilaian/{{ $value->id }}}/edit" class="btn btn-warning btn-sm">Edit</a>

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
@endsection
