<form id="form_{{ $id }}" class="d-inline" method="POST" action="{{ $url }}">
    @csrf
    @method($method)

    @if (isset($name) && isset($value))
        <input name="{{ $name }}" value="{{ $value }}" type="hidden"/>
    @endif

    <script>
        function submit_form_{{ $id }}() {
            form = document.getElementById('form_{{ $id }}');
            form.submit();
        }
    </script>

    <div class="d-inline" onclick="submit_form_{{ $id }}()">