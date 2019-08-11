@extends('layouts.backend.app')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <canvas id="appStat"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="businessStat"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function(){
        var ctxD = document.getElementById("appStat").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'bar',
            data: {
                labels: ['Categories', 'Businesses', 'Zones', 'Cities', 'Advertisement'],
                datasets: [{
                    label: '# of Items',
                    data: [{{ $categoryCount }}, {{ $businessCount }}, {{ $zoneCount }}, {{ $cityCount }}, {{ $advertisementCount }}],
                    backgroundColor: ['#F7464A', '#ef6c00', '#01579B', '#00b0ff', '#ff8f00'],
                    hoverBackgroundColor: ['#6a1b9a', '#0091ea', '#0091ea', '#6a1b9a', '#0091ea']
                }]
            },
            options: {
                responsive: true,
            }
        });

        var businessCtx = document.getElementById("businessStat").getContext('2d');
        var myLineChart = new Chart(businessCtx, {
            type: 'doughnut',
            data: {
                labels: ['Free A/C', 'Premium A/C'],
                datasets: [{
                    label: '# of Items',
                    data: [{{ $freeBusinessCount }}, {{ $premiumBusinessCount }}],
                    backgroundColor: ['#33b5e5', '#aa66cc'],
                    hoverBackgroundColor: ["#ffbb33", "#ff4444"]
                }]
            },
            options: {
                responsive: true
            }
        });
    });
    
</script>
@endpush
@endsection
