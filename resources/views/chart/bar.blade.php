<div class="col-xl-6">
    @include('common.cardview_begin', [ 'ficon' => 'chart-bar' ])
        <canvas id="bar_chart_{{ $id }}" onclick="updateBarChart{{ $id }}()" width="100%" height="40"></canvas>
    @include('common.cardview_end')
</div>

<script src="{{ asset('node_modules/chart.js/dist/chart.umd.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>

<script>
    function updateBarChart{{ $id }}() {
        labels = {{ Js::from($labels) }};
        dataset = {
            label: "{{ $tooltip }}",
            data: {{ Js::from($values) }}
        };
        updateBarChart('bar_chart_{{ $id }}', labels, dataset);
    }
    
    document.addEventListener("DOMContentLoaded", function(event) {
        updateBarChart{{ $id }}();
        //fillBarChart('bar_chart_{{ $id }}');
    });
</script>