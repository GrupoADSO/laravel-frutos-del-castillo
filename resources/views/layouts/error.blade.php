<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
    <style>
    </style>
</head>

<body>
    @yield('errores')
    <script>
        document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
        });
    </script>
</body>
</html>
