@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Perizinan</h6>
            </div>
            <div class="col-9" >
                <a class="btn btn-success fa-pull-right" href="{{ route('perizinan.create') }}" >
                    <i class='bx bx-plus text-white'></i>
                    {{-- <i  class="text-white"><box-icon name='plus'></box-icon></i> --}}
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {{-- @foreach ($izin as $nama )
            {{ $nama->nama_siswa }}
            @endforeach --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Dari</th>
                        <th scope="col">Sampai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($perizinan as $item)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$item->izin_dari}}</td>
                        <td>{{$item->izin_sampai }}</td>
                        <td>{{$item->keterangan }}</td>
                        <td>{{$item->approve }}</td>
                        <td> <a href="{{ route('perizinan.edit', $item->id) }}" class="btn btn-success">
                            <i class='bx bxs-pencil' ></i> Edit</a>
                            <a href="{{ route('perizinan.hapus', $item->id) }}" class="btn btn-danger"><i class='bx bxs-trash' ></i> Hapus</a></td>
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
