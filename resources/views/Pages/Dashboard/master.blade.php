@extends('Pages.template')


@section('content')
    @PushOnce('links')
        <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">
    @endPushOnce

    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            @include('Pages.Dashboard.components.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('contentDashboard')
            @include('Pages.Dashboard.components.footer')
        </div>
    </div>

    @pushOnce('scripts')
        <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    @endPushOnce
@endsection
