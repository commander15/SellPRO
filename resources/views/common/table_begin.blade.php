@include('common.cardview_begin', [ 'ficon' => 'table', 'header' => 'common.table_header' ])

<table id="databasesSimple_{{ $id }}">
    <thead>
        <tr>
        @foreach ($columns as $column)
            <th>{{ $column }}</th>
        @endforeach
            <th>Operations</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
        @foreach ($columns as $column)
            <th>{{ $column }}</th>
        @endforeach
            <th>Operations</th>
        </tr>
    </tfoot>

    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
    <script>
    window.addEventListener("DOMContentLoaded", function(event) {
        initTable('databasesSimple_{{ $id }}');
    });
    </script>