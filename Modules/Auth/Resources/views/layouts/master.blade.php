<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Auth Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-auth', 'resources/urls/sass/app.scss', storage_path('vite.hot')) }} --}}

    <!-- CSS files -->
    <link href="{{ url('public/modules/admin/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-vendors.min.css') }} " rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/demo.min.css') }}" rel="stylesheet"/>
    <style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
    </style>
</head>
<body  class=" d-flex flex-column">
    @yield('content')

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-auth', 'resources/urls/js/app.js', storage_path('vite.hot')) }} --}}
    
    <!-- Libs JS -->
    <!-- Tabler Core -->

    @yield('script')

    <script src="{{ url('public/modules/admin/js/demo-theme.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/js/tabler.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/js/demo.min.js') }}" defer></script>
  </body>
</html>
