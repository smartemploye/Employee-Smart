@extends('layout.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
            </div>
            <div class="col-9" >
                <a class="btn btn-success fa-pull-right" href="{{ route('sekolah.create') }}" >
                    <i class='bx bx-plus text-white'></i>
                    {{-- <i  class="text-white"><box-icon name='plus'></box-icon></i> --}}
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nis</th>
                      <th scope="col">Nama Sekolah</th>
                      <th scope="col">Alamat Sekolah</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($sekolah as $item)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$item->nis}}</td>
                        <td>{{$item->nama_sekolah }}</td>
                        <td>{{$item->alamat_sekolah }}</td>
                        <td> <a href="{{ route('sekolah.edit', $item->id) }}" class="btn btn-success">
                            <i class='bx bxs-pencil' ></i> Edit</a>
                            <a href="{{ route('sekolah.hapus', $item->id) }}" class="btn btn-danger"><i class='bx bxs-trash' ></i> Hapus</a></td>
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
