@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-lg-row flex-column gap-2 my-5">
            <div style="height: 300px" class="card p-3 pb-5 w-100">
                <h5 class="card-title fw-medium text-center mb-3">Pengunjung website bulan ini : {{ $visiCount }}</h5>
                <canvas id="lineChart"></canvas>
            </div>
            <div class="card p-3">
                <h5 class="card-title fw-medium text-center mb-3">Postingan paling banyak dikunjungi</h5>
                <div class="list-group">
                    @foreach ($topVisitedPosts as $post)
                        <a href="{{ url('berita/' . $post->slug) }}"
                            class="list-group-item list-group-item-action">{{ $post->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <h5 class="card-title fs-3 mb-3">Jumlah Data</h5>
            <div class="col-md-4">
                <a href="{{ route('list-posts') }}" class="text-white text-decoration-none">
                    <div class="card bg-danger text-white">
                        <div class="card-body text-center d-flex justify-content-between align-items-center">
                            <i class="fas fa-newspaper fa-2x"></i>
                            <h5 class="card-title">Berita & Kegiatan : {{ count($posts) }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('members') }}" class="text-white text-decoration-none">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center d-flex justify-content-between align-items-center">
                            <i class="fas fa-sitemap fa-2x"></i>
                            <h5 class="card-title">Pengurus : {{ count($members) }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('messages') }}" class="text-white text-decoration-none">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center d-flex justify-content-between align-items-center">
                            <i class="fas fa-envelope fa-2x"></i>
                            <h4 class="card-title">Pesan : {{ count($messages) }}</h4>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($visiMounth['labels']),
                datasets: [{
                    label: 'pengunjung',
                    data: @json($visiMounth['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Pengunjung',
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal',
                        }
                    }
                }
            }
        });
    </script>
@endsection
