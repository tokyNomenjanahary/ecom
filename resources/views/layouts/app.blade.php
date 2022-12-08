<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('header-style')
    @include('admin.components.layouts.header')
</head>

<body>
    <div id="app">
        @if (Auth::user() && Auth::user()->role->name == 'admin' && Auth::user()->role_id == 1 )
        @include('layouts.navigation')
        @else
        @include('layouts.navigation')
        @endif
        <main class="py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
</body>
@include('admin.components.layouts.footer_script')
{{-- <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script> --}}
</html>