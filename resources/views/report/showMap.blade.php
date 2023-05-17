@extends('layout.master')

@section('judul')
    Halaman Grafik
@endsection

@section('content')
    <div class="map_canvas">
        <div class="year-dropdown">
            <label for="tahun">Pilih Tahun:</label>
            <select name="tahun" id="tahun">
                {{-- <option value="">Semua Tahun</option> --}}
                <?php
                $currentYear = date('Y');
                for ($year = $currentYear; $year >= 1900; $year--) {
                    echo "<option value=\"$year\">$year</option>";
                }
                ?>
            </select>
            <select name="bulan" id="bulan">
                <?php
                $bulan = ['01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];
                
                foreach ($bulan as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
                ?>
            </select>
        </div>

        <canvas id="myChart" width="auto" height="100"></canvas>
    </div>


    {{-- @section('scripts') --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

    <script>
        var myChart;
        $('.year-dropdown #tahun, .year-dropdown #bulan').change(function() {
            let tahun = $('#tahun').val();
            let bulan = $('#bulan').val();

            let tanggal = tahun + '-' + bulan;

            chartLoader(tanggal);
        });
        document.addEventListener('DOMContentLoaded', function() {
            chartLoader();
        });

        function chartLoader(tahun) {
            let csrf = '{{ csrf_token() }}';
            $.ajax({
                url: '/show-chart',
                type: 'POST',
                data: {
                    tanggal: tahun,

                    _token: csrf,
                },
                success: function(data) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    chart(data.labels, data.prices);
                }
            })
        }

        function chart(labels, prices) {
            var ctx = document.getElementById('myChart').getContext('2d');
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: prices,
                        backgroundColor: [
                            'rgba(31, 58, 147, 1)',
                            'rgba(37, 116, 169, 1)',
                            'rgba(92, 151, 191, 1)',
                            'rgb(200, 247, 197)',
                            'rgb(77, 175, 124)',
                            'rgb(30, 130, 76)'
                        ],
                        borderColor: [
                            'rgba(31, 58, 147, 1)',
                            'rgba(37, 116, 169, 1)',
                            'rgba(92, 151, 191, 1)',
                            'rgb(200, 247, 197)',
                            'rgb(77, 175, 124)',
                            'rgb(30, 130, 76)'
                        ],
                        borderWidth: 1
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    },
                    plugins: {
                        title: {
                            display: false,
                            text: 'Custom Chart Title'
                        },
                        legend: {
                            display: true,
                        }
                    }
                }
            });
        }
    </script>
@endsection
{{-- @endsection --}}
