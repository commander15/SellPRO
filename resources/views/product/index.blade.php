@extends('common.view', [
    'id' => 'products',
    'title' => 'Products',
    'sub_title' => 'More products, more fun !'
])

@section('content')

<div class="row">

    @include('common.table_begin', [
        'title' => 'Products',
        'id' => 1,
        'columns' => [
            'Name',
            'Description',
            'Price'
        ],
        'add_link' => url('/products/create')
    ])

    @foreach ($products as $product)
        @include('common.table_row_begin')
            <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
        @include('common.table_row_end', [
            'data_id' => $product->id,
            'edition_link' => url('/products'),
            'deletion_link' => url('/products')
        ])
    @endforeach

    @include('common.table_end')

</div>

@endsection