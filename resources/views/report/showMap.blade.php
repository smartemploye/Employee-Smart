@extends('layout.master')

@section('judul')
Halaman Grafik
@endsection

@section('content')
<div class="map_canvas">
    <div class="year-dropdown">
        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" id="tahun">
            <option value="">Semua Tahun</option>
            <?php
            $currentYear = date('Y');
            for ($year = $currentYear; $year >= 1900; $year--) {
                echo "<option value=\"$year\">$year</option>";
            }
            ?>
        </select>
    </div>
    <canvas id="myChart" width="auto" height="100"></canvas>
</div>
@endsection

{{-- @section('scripts') --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var labels = @json($labels);
        var prices = @json($prices);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
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
                }]
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
    });
</script>
{{-- @endsection --}}
