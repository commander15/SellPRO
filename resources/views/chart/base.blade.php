@include('common.cardview_begin', [ 'ficon' => $type . '-chart' ])

    @php
        $chart_name = '';
        for ($i = 0; $i < strlen($type); $i++) {
            if ($i == 0)
                $chart_name .= strtoupper($type[$i]);
            else
                $chart_name .= $type[$i];
        }

        $chart_type = $type;
    @endphp

    <canvas id="{{ $chart_type }}_chart_{{ $id }}" width="100%" height="40" onclick="update{{ $chart_name }}Chart{{ $id }}()">
    </canvas>
    
    <script>
    function update{{ $chart_name }}Chart{{ $id }}() {
        labels = {{ Js::from($labels) }};
        dataset = {
        @foreach ($dataset as $data)
            {{ $data['name'] }}: {{ Js::from($data['values']) }},
        @endforeach
            type: '{{ $chart_type }}'
        };
        update{{ $chart_name }}Chart('{{ $chart_type }}_chart_{{ $id }}', labels, dataset);
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        update{{ $chart_name }}Chart{{ $id }}();
    });
    </script>

@include('common.cardview_end')

    <script src="{{ asset('node_modules/chart.js/dist/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-' . $chart_type .'-demo.js') }}"></script>