@include('common.view_begin')

<div class="container-fluid px-4">
    @include('common.title')
    @yield('content')
</div>

@include('common.view_end')