<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.partials.head')
<body class="container mt-5">
@include('layout.partials.top_navigation')
@include('layout.partials.message_bag')
@yield('content')
</body>
</html>
