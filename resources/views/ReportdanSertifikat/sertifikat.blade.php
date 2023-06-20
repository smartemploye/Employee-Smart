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
    {{-- <img class="image" src="{{  '/image/' . $settingMagang->Sertifikat }}"> --}}
    <img class="image" src="{{ public_path() . '/image/' . $settingMagang->Sertifikat }}">
    <div class="overlay">
        <div style="font-weight: bold; font-size:34px">
            {{ $siswa->nama_siswa }}
        </div>
    </div>
</div>
<!-- Tambahkan library DOMPDF -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dompdf/0.8.1/dompdf.min.js"></script> --}}

<div class="container">
    <img class="image" src="{{ public_path() . '/sertifikat/Sertif_belakang.jpg' }}">
    <div class="overlay" style="top: 30%; left: 11%">
        <div class="row">
            <div class="col-12">
                <table  border="1" cellspacing="0" id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            
                            <th class="text-center" width="650px">Komponen Penilaian</th> <th class="text-center" width="80px" >Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($komponen_penilaian as $key => $value)
                        {{$k = $value-> nama_komponen}}
                        <tr>
                            <td style="padding: 1px 3px;" align="center">{{$key + 1}}</td>
                            <td >{{$value -> nama_komponen}}</td>
                            <td align="center">{{@$nilai -> $k}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // // Mengonversi tabel menjadi file PDF
    // function convertToPDF() {
    //     const table = document.getElementById("example1").outerHTML;
    //     const html = `
    //         <html>
    //         <head>
    //             <style>
    //                 table {
    //                     width: 100%;
    //                     border-collapse: collapse;
    //                 }
    //                 th, td {
    //                     border: 1px solid black;
    //                     padding: 8px;
    //                 }
    //             </style>
    //         </head>
    //         <body>
    //             ${table}
    //         </body>
    //         </html>
    //     `;

    //     const pdf = new window.jsPDF();
    //     pdf.fromHTML(html, 15, 15, {
    //         width: 180
    //     });
    //     pdf.save("table.pdf");
    // }
</script>
