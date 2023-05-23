{{-- @extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jam Masuk</th>
        <th scope="col">Jam Pulang</th>
        <th scope="col">Nomor VA</th>
        <th scope="col">Kuota Magang</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($settingmagang as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->jam_Masuk_kerja}}</td>
                <td>{{$value->jam_Pulang_kerja}}</td>
                <td>{{$value->no_va}}</td>
                <td>{{$value->Kuota_Magang}}</td>
                <td>
                    
                    <form action="/settingmagang/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/settingmagang/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/settingmagang/{{$value->id}}}/edit" class="btn btn-warning btn-sm">Edit</a>
                       
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

@endsection --}}


@extends('layout.master')

@section('judul')
Halaman Seting Magang
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Pulang</th>
            <th scope="col">Nomor VA</th>
            <th scope="col">Kuota Magang</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($settingmagang as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->jam_Masuk_kerja}}</td>
            <td>{{$value->jam_Pulang_kerja}}</td>
            <td>{{$value->no_va}}</td>
            <td>{{$value->Kuota_Magang}}</td>
            <td>

                <form action="/settingmagang/{{$value->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/settingmagang/{{$value->id}}" class="btn btn-info btn-sm" onclick="showDetailConfirmation()">Detail</a>
                    <a href="/settingmagang/{{$value->id}}/edit" class="btn btn-warning btn-sm" onclick="showEditConfirmation()">Edit</a>

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

<!-- Pop-up Detail -->
<div id="detailPopup" class="popup">
    <div class="popup-content">
        <h2>Detail Pop-up</h2>
        <p>Ini adalah pop-up untuk detail.</p>
    </div>
</div>

<!-- Pop-up Edit -->
<div id="editPopup" class="popup">
    <div class="popup-content">
        <h2>Edit Pop-up</h2>
        <p>Ini adalah pop-up untuk edit.</p>
    </div>
</div>

<style>
    /* CSS untuk pop-up */
    .popup {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .popup-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }
</style>

<script>
    // Fungsi untuk menampilkan pop-up detail
    function showDetailConfirmation() {
        var popup = document.getElementById('detailPopup');
        popup.style.display = 'block';
    }

    // Fungsi untuk menampilkan pop-up edit
    function showEditConfirmation() {
        var popup = document.getElementById('editPopup');
        popup.style.display = 'block';
    }
</script>

@endsection
