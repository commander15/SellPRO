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
            'Name',
            'Description',
            'Price'
        ],
        'add_link' => $link . '/create'
    ])

    @foreach ($customers as $customer)
        @include('common.table_row_begin')
            <td><a href="{{ $link }}/{{ $customer->id }}">{{ $customer->name }}</a></td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->firstName }}</td>
        @include('common.table_row_end', [
            'id' => $customer->id,
            'edition_link' => $link,
            'deletion_link' => $link
        ])
    @endforeach

    @include('common.table_end')

</div>

@endsection