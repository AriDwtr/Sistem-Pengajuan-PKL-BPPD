@extends('admin.base_theme.master')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Peserta Magang Aktif</p>
                            <h4 class="my-1">{{ $total_peserta }} Pelajar</h4>
                        </div>
                        <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Peserta Selesai</p>
                            <h4 class="my-1">{{ $total_peserta_selesai }} Pelajar</h4>
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Instansi Terdaftar</p>
                            <h4 class="my-1">{{ $instansi }} Instansi</h4>
                        </div>
                        <div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i class="bx bx-buildings"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Kordinator Terdaftar</p>
                            <h4 class="my-1">{{ $total_kordinator }} Orang</h4>
                        </div>
                        <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class="bx bx-user-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container1">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container1">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            "use strict";
            //pie
            new Chart(document.getElementById("chart3"), {
                type: 'pie',
                data: {
                    labels: ["Laki-Laki", "Perempuan", ],
                    datasets: [{
                        label: "Jenis Kelamin",
                        backgroundColor: ["#0d6efd", "#17a00e"],
                        data: [{{ $laki }}, {{ $perempuan }}, ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Total Gender Peserta Magang / Penelitian'
                    }
                }
            });

            //bar
            var ctx = document.getElementById("chart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [@php foreach($total_instansi as $order) { echo "'".$order->nama_instansi."',"; } @endphp],
                    datasets: [{
                        label: 'Instansi Penempatan',
                        data: [@foreach ($total_instansi as $data){{ $data->total.',' }}@endforeach],
                        barPercentage: .5,
                        backgroundColor: "#0d6efd"
                    },]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#585757',
                            boxWidth: 40
                        }
                    },
                    tooltips: {
                        enabled: true
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.07)"
                            },
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.07)"
                            },
                        }]
                    }
                }
            });
        });
    </script>
@endsection
