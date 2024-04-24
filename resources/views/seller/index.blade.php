@extends('common.view', [
    'id' => 'sellers',
    'title' => 'Sellers', 
    'sub_title' => 'More sellers, more sells'
])

@section('content')

@include('common.table_begin', [
    'id' => 1,
    'title' => 'Sellers',
    'columns' => [
        'Name',
        'Email'
    ],
    'add_link' => url('/sellers/create')
])

@foreach ($sellers as $seller)
    @include('common.table_row_begin')
        <td>{{ $seller->name }}</td>
        <td>{{ $seller->email }}</td>
    @include('common.table_row_end', [
        'data_id' => $seller->id,
        'edition_link' => url('/sellers'),
        'deletion_link' => url('/sellers')
    ])
@endforeach

@include('common.table_end')

@endsection