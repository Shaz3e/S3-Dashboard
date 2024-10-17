<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- favicon --}}
    <link rel="shortcut icon"
        href="{{ DiligentCreators('favicon') ? asset('storage/' . DiligentCreators('favicon')) : asset('assets/images/favicon.png') }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')

    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @livewireStyles
</head>

<body>
    {{-- Begin page  --}}
    <div id="layout-wrapper">

        {{-- header --}}
        @yield('header')

        {{-- sidebar --}}
        @yield('sidebar')

        {{-- Start right Content here --}}
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                {{-- /.container-fluid --}}
            </div>
            {{-- /.End Page-content --}}

            @yield('footer')

        </div>
        {{-- /.end main content --}}

    </div>
    {{-- /.END layout-wrapper --}}

    @include('components.layouts.right-sidebar')

    {{-- Right bar overlay --}}
    <div class="rightbar-overlay"></div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/remix-icons-list.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('components.sweetalert')

    @stack('scripts')

    <x-appjs />

    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    @livewireScripts
</body>

</html>
