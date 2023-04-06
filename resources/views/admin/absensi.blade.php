@extends('layout.master')

@section('content')

<button type="submit" style="color: white;background-color: rgb(46, 165, 74);border-radius: 10px;margin-left: 1100px">Tambah Data</button>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Masuk</th>
        <th scope="col">Pulang</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{ $item->masuk }}</td>
            <td>{{ $item->pulang }}</td>
            <td>
                <a href="" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a> <a href="" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i></a>
                <form method="post" action="" onsubmit="javascript:return confirm('Apa anda yakin?')">
                    @csrf
                    @method('delete')
                    <button type="submit" href="" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                    <a href="" class="btn btn-sm btn-success"> <i class="fa fa-clock"></i>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
