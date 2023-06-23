<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        position: relative;
        width: 100%;
        height: 100vh;
        background-color: blue;
    }

    .image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #example1 tbody td {
        padding-left: 10px;
        padding-right: 10px;
    }
    .overlay {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: black;
        font-size: 24px;
    }
</style>
<div class="container">
    <img class="image" src="{{ public_path() . '/image/' . $settingMagang->Sertifikat }}">
    <div class="overlay">
        <div style="font-weight: bold; font-size:34px">
            {{ $siswa->nama_siswa }}
        </div>
    </div>
</div>

<div class="container">
    <img class="image" src="{{ public_path() . '/sertifikat/Sertif_belakang.jpg' }}">
    <div class="overlay" style="top: 30%; left: 12%">
        <div class="row">
            <div class="col-12">
                <table width="780px" border="1" cellspacing="0" id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th class="text-center">Komponen Penilaian</th>
                            <th class="text-center">Persentase</th>
                            <th class="text-center">Nilai</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                        $totalPresentase = 0; // Inisialisasi variabel total presentase
                        $totalNilai = 0; // Inisialisasi variabel total nilai
                        @endphp
                        @foreach ($komponen_penilaian as $key => $value)
                        @php
                        $k = $value->nama_komponen;
                        $presentase = $value->presentase;
                        $nl = @$nilai->$k;
                        $totalPresentase += $presentase; // Menambahkan presentase ke total presentase
                        $totalNilai += $nl; // Menambahkan nilai ke total nilai
                        @endphp
                        <tr>
                            <td style="padding: 1px 3px;" align="center">{{ $key + 1 }}</td>
                            <td>{{ $value->nama_komponen }}</td>
                            <td align="center">{{ $presentase }}%</td>
                            <td align="center">{{ $nilai->$k }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="text-align: center; font-weight: bold;">Nilai Akhir</td>
                            <td align="center" style="font-weight: bold;">{{ $totalNilai / count($komponen_penilaian) }}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

