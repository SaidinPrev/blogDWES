<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titol')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
    
<body class="bg-light">
    @include('partials.nav')
    <main class="container my-5">
        @yield('contingut')
    </main>
</body>
</html>