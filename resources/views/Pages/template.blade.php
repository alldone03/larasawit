<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title') - {{ env('APP_NAME') }}</title>
    @stack('links')
</head>

<body>
    @yield('content')
    @stack('scripts')
</body>

</html>
