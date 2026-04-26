{{-- ============================================================
     resources/views/layouts/app.blade.php
     Layout principal — incluye el navbar
     ============================================================ --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'KBR KapitalHaus — Gestión Inmobiliaria')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.jpg') }}" />
</head>
<body style="margin:0; padding:0;">

    {{-- Navbar (todo el estilo, html y js están dentro de este partial) --}}
    @include('layouts.navbar')

    {{-- Contenido de cada página --}}
    {{-- El padding-top:68px compensa la altura del navbar fijo --}}
    <main style="padding-top: 68px;">
        @yield('content')
    </main>

</body>
</html>