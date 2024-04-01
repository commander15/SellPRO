<!DOCTYPE HTML>

@php
$view_id = $id;
@endphp

<html>
    <head>
        @include('common.head')
    </head>

    <body class="sb-nav-fixed">
        @include('common.navbar')
        @include('common.sidebar_begin')

        @if (isset($error_message) && $error_message)
            <div id="message" class="container">
                <center>
                    <div class="col-6" style="background-color: red; border: 1px solid red; border-radius: 6px; margin-top: 12px">
                        <div class="text-center center" style="font-size: 18pt; color: white">
                        {{ $error_message }}
                        </div>
                    </div>
                </center>
            </div>

            <script>
                msg = document.getElementById('message');
            </script>
        @endif