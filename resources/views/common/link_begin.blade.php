<div id="link_{{ $data_id }}" class="d-inline">
    <script>
        function send_request_{{ $data_id }}() 
        {
            fetch('{{ $url }}', {
                'method': '{{ $method }}',
                'headers': {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                @if (isset($data))
                    JSON.stringify({{ Js::from($data) }}),
                @endif
            }).then(response => {
                if (!response.ok)
                    alert('Error during request !');
                else
                    window.location.reload();
            });
        }
    </script>

    <div class="d-inline" onclick="send_request_{{ $data_id }}()">