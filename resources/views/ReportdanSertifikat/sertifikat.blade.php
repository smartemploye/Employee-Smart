<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        position: relative;
        width: 100%;
        height: 100vh;
    }

    .image {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
    {{-- <img class="image" src="{{  '/image/' . $settingMagang->Sertifikat }}"> --}}
    <img class="image" src="{{ public_path() . '/image/' . $settingMagang->Sertifikat }}">
    <div class="overlay">
        <div style="font-weight: bold; font-size:34px">
            {{ $siswa->nama_siswa }}
        </div>
    </div>
</div>
<div class="container">
    {{-- <img class="image" src="{{  '/image/' . $settingMagang->Sertifikat }}"> --}}
    <img class="image" src="{{ public_path() . '/sertifikat/Sertif_belakang.jpg' }}">
    {{-- <div class="overlay"> --}}
        {{-- {{-- <table class="table"> --}}
            {{-- <thead>
                <tr>
                    <th></th>
                    <th>Penilaian</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table> 
    </div> --}}
</div> 

