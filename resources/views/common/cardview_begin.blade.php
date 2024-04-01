<div class="card mb-4">
    <div class="card-header">
        @if (isset($icon))
            <img src="{{ $icon }}" width="26px" height="26px" />
        @elseif (isset($ficon))
            <i class="fas fa-{{ $ficon }} me-1"></i>
        @endif
            {{ $title }}

        @if (isset($header))
            <div class="container d-inline">
                <div class="row justify-content-end d-inline">
                    @include($header)
                </div>
            </div>
        @endif
    </div>
    
    <div class="card-body">