<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard-assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('dashboard-assets/img/favicon.png') }}">
    <title>Argon Dashboard</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard-assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('dashboard-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('dashboard-assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    @include('partials.sidebar')

    <main class="main-content position-relative border-radius-lg">

        @include('partials.navbar')

        <div class="container-fluid py-4">

            @yield('content')

            {{-- @include('partials.footer') --}}

        </div>
    </main>

    {{-- @include('partials.setting-sidebar') --}}


    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard-assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/plugins/chartjs.min.js') }}"></script>

    @yield('script')
    
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard-assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>
</html>