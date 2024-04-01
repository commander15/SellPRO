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
                'labels' => $area['labels'],
                'dataset' => [
                    [ 'name' => 'data', 'values' => $area['data'] ],
                    [ 'name' => 'colors', 'values' => [ '#007bff', '#dc3545' ] ]
                ]
            ])

            @include('chart.area', [ 
                'id' => 2,
                'title' => 'Sales', 
                'labels' => $area['labels'],
                'dataset' => [
                    [ 'name' => 'data', 'values' => $area['data'] ],
                    [ 'name' => 'label', 'values' => 'Quantity' ]
                ]
            ])
            </div>
    </div>
</div>

@endsection