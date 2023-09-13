<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Vehicle Management System') }}</title>
        @stack('css')
        <link href="{{ asset('css') }}/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
        @stack('js')
    </head>
    <body class="nav-fixed">
        <!-- Begin::Header -->
            @include('layouts.partials.header.topbar')
        <!-- End::Header -->
        <div id="layoutSidenav">
            <!-- Begin::Side Menu -->
                @include('layouts.partials.sidebar.menu')
            <!-- End::Side Menu -->
            <div id="layoutSidenav_content">
                <!-- Begin::Content -->
                    @yield('content')
                <!-- End::Content -->

                <!-- Begin::Footer -->
                    @include('layouts.partials.footer')
                <!-- End::Footer -->


            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js') }}/scripts.js"></script>
    </body>
</html>
