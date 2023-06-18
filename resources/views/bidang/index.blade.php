@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
                @push('scripts')

                <script src="{{ asset('/template/plugins/datatables/jquery.dataTables.js') }}"></script>
                <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(function() {
                        $("#example1").DataTable();
                    });

                    function confirmDelete(url) {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data ini akan dihapus secara permanen!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        });
                    }

                    function confirmEdit(url) {
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
                                window.location.href = url;
                            }
                        });
                    }
                </script>
                 @endpush
            </div>
            <div class="col-9" >
                <a class="btn btn-success fa-pull-right" href="{{ route('bidang.create') }}" >
                    <i class='bx bx-plus text-white'></i>
                    {{-- <i  class="text-white"><box-icon name='plus'></box-icon></i> --}}
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Jurusan</th>
                      <th scope="col">Jenis Jurusan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($bidang as $item)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$item->nama_bidang}}</td>
                        <td>{{$item->jenis_jurusan}}</td>
                        {{-- <td> <a href="{{ route('bidang.edit', $item->id) }}" class="btn btn-success">
                            <i class='bx bxs-pencil' ></i> Edit</a>
                            <a href="javascript:void(0);" onclick="confirmDelete('{{ route('bidang.hapus', $item->id) }}')" class="btn btn-danger"><i class='bx bxs-trash' style="width: 15px;height: 20px;"></i> Hapus</a> --}}
                            <td> 
                                <a href="javascript:void(0);" onclick="confirmEdit('{{ route('bidang.edit', $item->id) }}')" class="btn btn-success">
                                    <i class='bx bxs-pencil' ></i> Edit
                                </a>
                                <a href="javascript:void(0);" onclick="confirmDelete('{{ route('bidang.hapus', $item->id) }}')" class="btn btn-danger">
                                    <i class='bx bxs-trash' style="width: 15px;height: 20px;"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $perizinan->links() !!} --}}
        </div>
    </div>
</div>
  </table>
@endsection
