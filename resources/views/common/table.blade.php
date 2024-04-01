@extends('common.card_view')

@section('header')

<div class="row">
    <a href="#">
        <button class="btn btn-primary">Add</button>
    </a>
</div>

@endsection

@section('body')

@include('common.table_begin')
@yield('content')
@include('common.table_end')

@endsection