<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('front/img/favicon.png')}}">
    <title>
      Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('front/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('front/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('front/css/soft-ui-dashboard.css')}}" rel="stylesheet" />

  </head>

  <body class="offline-doc">
    <!-- Navbar -->
    
    {{-- @include('layouts.navbar'); --}}
    
    <!-- End Navbar -->

    <!-- Header -->
    
    {{-- @include('layouts.header'); --}}
    
    <!-- End Header -->

    <!-- Footer -->
    
    {{-- @include('layouts.footer'); --}}
    
    <!-- End Footer -->

    <!-- Pages -->
    @auth
        @yield('auth')
    @endauth

    @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
    @endif 

    <!--   Core JS Files   -->
    <script src="{{asset('front/js/core/popper.min.js')}}"></script>
    <script src="{{asset('front/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('front/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('front/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('front/js/plugins/fullcalendar.min.js')}}"></script>
    @stack('rtl')
    @stack('dashboard')
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
    <script src="{{asset('front/js/soft-ui-dashboard.min.js?v=1.0.6')}}"></script>
  </body>

</html>