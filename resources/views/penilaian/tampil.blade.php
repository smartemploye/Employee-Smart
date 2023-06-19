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


    <div class="d-flex justify-content-end mb-2">
        <a href="javascript:window.print()" class="print-button">    
            <button>Cetak Nilai</button>
        </a>
    </div>
    

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col" rowspan="2" class="text-center">No</th>
                <th scope="col" rowspan="2"class="text-center">Nama</th>
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
