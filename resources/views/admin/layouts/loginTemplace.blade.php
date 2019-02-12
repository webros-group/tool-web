<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.header')
</head>
<body>
    @yield('content')
</body>
</html>
