@extends('layouts.app')

@section('title', 'Last Result')

@section('content')
<div class="container">
    <h1 class="mt-4">Last Result</h1>
    <div class="card">
        <div class="card-body">
            <!-- Display the recommended majors -->
            <h5 class="card-title">Recommended Majors</h5>
            <p class="card-text">Based on your most recent responses, the recommended major(s) are:</p>
            <h3 class="text-primary">
                @foreach($recommended_majors as $major)
                    {{ $major }}@if(!$loop->last), @endif
                @endforeach
            </h3>
            
            <!-- Display the pie chart -->
            <div class="mt-4">
                <h5 class="card-title">Recommended Majors Distribution</h5>
                <canvas id="majorsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('majorsChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Informatika', 'Sistem Informasi', 'Teknologi Informasi'],
                datasets: [{
                    label: 'Distribution of Recommended Majors',
                    data: [
                        {{ $scores['informatika'] }},
                        {{ $scores['sistem_informasi'] }},
                        {{ $scores['teknologi_informasi'] }},
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const value = tooltipItem.raw;
                                const total = tooltipItem.chart.data.datasets[tooltipItem.datasetIndex].data.reduce((a, b) => a + b, 0);
                                const percent = ((value / total) * 100).toFixed(2);
                                return `${tooltipItem.label}: ${value} (${percent}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection