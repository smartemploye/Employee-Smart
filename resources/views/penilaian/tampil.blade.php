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
            function printTable() {
            window.print();
            }
        </script>
    @endpush

    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    @endpush

    {{-- <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-primary" onclick="printTable()">Print</button>
    </div>    --}}

    <div class="d-flex justify-content-end mb-2">
        <p>Cetak Nilai</p>
        <a href="javascript:window.print()" class="print-button">    
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <!-- Isi dengan kode SVG Anda -->
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
        </a>
    </div>
    

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

                            {{-- <a href="/penilaian/{{ $value->id }}}/edit" class="btn btn-warning btn-sm">Edit</a> --}}
                            <a href="#" onclick="showEditConfirmation({{ $value->id }})"
                                class="btn btn-warning btn-sm">Edit</a>

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
        function showEditConfirmation(id) {
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
                    // Redirect ke halaman edit dengan mengganti id
                    window.location.href = "/penilaian/" + id + "/edit";
                }
            });
        }
    </script>
@endsection
