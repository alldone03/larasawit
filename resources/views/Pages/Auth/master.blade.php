@extends('Pages.template')


@section('content')
    @push('links')
        <link rel="stylesheet" href="assets/compiled/css/app.css">
        <link rel="stylesheet" href="assets/compiled/css/app-dark.css">
        <link rel="stylesheet" href="assets/compiled/css/auth.css">
        <link rel="shortcut icon" href="assets/static/images/logo/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="assets/static/images/logo/favicon.png" type="image/png">
    @endpush
    <script src="assets/static/js/initTheme.js"></script>
    @yield('auth-content')
    @pushOnce('scripts')
    @endPushOnce()
@endsection
