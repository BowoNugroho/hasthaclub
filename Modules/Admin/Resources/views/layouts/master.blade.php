<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- CSS files -->
    <link href="{{ url('public/modules/admin/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/tabler-vendors.min.css') }} " rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/demo.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/modules/admin/css/sweetalert2.min.css') }}" rel="stylesheet"/>
    <style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
    </style>
    @yield('style')
</head>
<body  class="layout-fluid">
    <div class="page">
        
        @include('admin::layouts.header')

        @include('admin::layouts.navbar')
        
        <div class="page-wrapper">
            {{-- <!-- Page header -->
            <div class="page-header d-print-none">
              <div class="container-xl">
                <div class="row g-2 align-items-center">
                  <div class="col">
                    <h2 class="page-title">
                      Empty page
                    </h2>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- Page body -->
            <div class="page-body">
              <div class="container-xl">
                <!-- Content here -->
                @yield('content')
              </div>
            </div>

            @include('admin::layouts.footer')

        </div>
    </div>

    <script src="{{ url('public/modules/admin/js/demo-theme.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/js/tabler.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/js/demo.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/js/sweetalert2.all.min.js') }}" defer></script>
    <script src="{{ url('public/modules/admin/libs/toastr/toastr.min.js') }}" defer></script>

    @yield('script')
    @include('admin::layouts.partials.toastMessage')

    <script>
         @if (Auth::check()) 
            var timeout = ({{config('session.lifetime')}} * 60000) -10 ;
            setTimeout(function(){
                window.location.reload(1);
            },  timeout);
        @endif
        
        $('body').on('click', '.logout', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            Swal.fire({
                title: "Do you want to log out?",
                text: "You can login back to continue the activity",
                icon: "warning",
                buttons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    $('#logout-form').submit();
                } else {
                  Swal.fire(
                    "Cancel!",
                    "You haven't logged out yet.",
                    "error"
                  )
                }
            })
        });
    </script>
  </body>
</html>
