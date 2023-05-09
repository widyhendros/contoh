<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
        <title>SMAN 21 Bandung</title>
        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <link rel="icon" type="image/x-icon" href="/images/logo/logo21.png">

        <!-- Styles -->
        @include('layouts.partials.styles')
    </head>
    <body>
        <div id="app">
            {{-- @if(Session::get('admin') =='1') --}}
                @include('layouts.partials.sidebar')
            {{-- @endif --}}
            
            <div id="main" class='layout-navbar'>
                @include('layouts.partials.header')
                <div id="main-content">

                    <div class="page-heading">
                        <div class="page-title">
                            {{ $header }}
                        </div>
                        {{ $slot }}
                    </div>

                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>

        <!-- Scripts -->
        @include('layouts.partials.scripts')

    </body>
</html>
