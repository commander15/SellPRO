@php
$title = 'Customers';
$link = '/customers';
@endphp

@extends('common.view', [
    'id' => 'customers',
    'title' => 'Customers',
    'sub_title' => 'More customers, happy buisiness !',
    'link' => url('/customers')
])

@section('content')

<div class="row">

    @include('common.table_begin', [
        'id' => 1,
        'columns' => [
            'NIC',
            'Name',
            'First Name'
        ],
        'add_link' => $link . '/create'
    ])

    @foreach ($customers as $customer)
        @include('common.table_row_begin')
            <td>{{ $customer->nic }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->firstName }}</td>
        @include('common.table_row_end', [
            'data_id' => $customer->id,
            'edition_link' => $link,
            'deletion_link' => $link
        ])
    @endforeach

    @include('common.table_end')

</div>

@endsection