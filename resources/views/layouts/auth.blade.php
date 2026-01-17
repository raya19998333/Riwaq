<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'المجمع الثقافي بصلالة')</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @stack('styles')
</head>
<body>

    @yield('content')

    @stack('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
