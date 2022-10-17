@extends('layouts.app')

@section('auth')
    @if (Request::is('sign-up'))
        @include('layouts.navbar.nav-pages')
        <div class="main-content  mt-0">
            @yield('content')
            @include('layouts.footer.footer-pages')
        </div>

    @elseif (Request::is('sign-in'))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbar.nav-pages')
                </div>
            </div>
        </div>
        @yield('content')
        @include('layouts.footer.footer-pages')

    @else
        @if (Request::is('profile'))
            <div class="g-sidenav-show bg-gray-100">
                @include('layouts.sidebar')
                <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                    @include('layouts.navbar.navbar')
                    @yield('content')
                </div>
                @include('layouts.toggle')
            </div>
        @elseif (Request::is('rtl'))
            <div class="g-sidenav-show rtl bg-gray-100">
                @include('layouts.sidebar')
                <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
                    @include('layouts.navbar.navbar')
                    @yield('content')
                </main>
                @include('layouts.toggle')
            </div>
        @elseif (Request::is('virtual-reality'))
            <div class="g-sidenav-show  bg-gray-100 virtual-reality">
                <div>
                    @include('layouts.navbar.navbar')
                </div>
                <div class="border-radius-xl mt-3 mx-3 position-relative" style="background-image: url('{{asset('front/img/vr-bg.jpg')}}; background-size: cover;">
                    @include('layouts.sidebar')
                    <main class="main-content mt-1 border-radius-lg">
                        @yield('content')
                    </main>
                </div>
                @include('layouts.footer.footer')
                @include('layouts.toggle')
            </div>
        @else
            <div class="g-sidenav-show  bg-gray-100">
                @include('layouts.sidebar')
                <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
                    @include('layouts.navbar.navbar')
                    @yield('content')
                </main>
            </div>
        @endif

        @include('layouts.toggle')
    @endif
@endsection