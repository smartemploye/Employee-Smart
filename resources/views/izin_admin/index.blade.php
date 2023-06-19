@extends('layout.master')
@section('nama_profile')

@endsection
@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Perizinan</h6>
                @push('scripts')

                <script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
                <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(function() {
                        $("#example1").DataTable();
                    });
                

                    function confirmDelete(url) {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            window.location.href = url;
                        }
                    }

                    function confirmEdit(url) {
                        Swal.fire({
                            title: 'Konfirmasi Edit',
                            text: 'Apakah Anda yakin ingin mengedit data ini?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        });
                    }
                </script>
                @endpush
            </div>
            <div class="col-9">
            </div>
        </div>
    </div>
    @push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    @endpush
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Dari</th>
                        <th scope="col">Sampai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Dokumentasi</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($perizinan as $izin)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$izin->nama_siswa}}</td>
                        <td>{{$izin->izin_dari}}</td>
                        <td>{{$izin->izin_sampai }}</td>
                        <td>{{$izin->status_absen }}</td>
                        <td>{{$izin->keterangan }}</td>
                        <td>
                            <img width="300px" src="{{ asset('image/dokumentasi/'.$izin->dokumentasi) }}">
                        </td>
                        <td>{{$izin->approve }}</td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmEdit('{{ route('izin_admin.edit', $izin->id) }}')" class="btn btn-success">
                                <i class='bx bxs-pencil' ></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('/template/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('/template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('/template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('/template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('/template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{ asset('/template/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{ asset('/template/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
