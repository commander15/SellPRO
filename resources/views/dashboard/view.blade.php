@extends('common.view', [
    'id' => "dashboard",
    'title' => 'Dashboard',
    'sub_title' => 'Dashboard'
])

@section('content')

<div class="row">
    @include('dashboard.card', [ 'title' => 'Primary Card', 'type' => 'primary' ])
    @include('dashboard.card', [ 'title' => 'Warning Card', 'type' => 'warning' ])
    @include('dashboard.card', [ 'title' => 'Success Card', 'type' => 'success' ])
    @include('dashboard.card', [ 'title' => 'Danger Card', 'type' => 'danger' ])
</div>

<div class="row">
    <div class="col-xl-6">
        @include('chart.pie', [ 
            'id' => 1,
            'title' => 'Top 5 Products',
            'labels' => $top['labels'],
            'dataset' => [
                [ 'name' => 'data', 'values' => $top['data'] ],
                [ 'name' => 'colors', 'values' => $top['colors'] ]
            ]
        ])
    </div>

    <div class="col-xl-6">
        @include('chart.area', [ 
            'id' => 2,
            'title' => 'Sales', 
            'labels' => $growth['labels'],
            'dataset' => [
                [ 'name' => 'data', 'values' => $growth['data'] ],
                [ 'name' => 'label', 'values' => 'Amount' ]
            ]
        ])
    </div>
</div>

@endsection