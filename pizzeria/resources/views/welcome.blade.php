<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu estilo personalizado -->
    <link rel="stylesheet" href="{{ asset('css/welcomeStyle.css') }}">
</head>
<body class="d-flex align-items-center" style="height: 100vh;">

    <div class="container text-center">
        <h1 class="display-4 mb-4" style="color: #c1121f;">Bienvenido a <strong>PizzaApp</strong> 🍕</h1>
        <p class="lead mb-5 text-dark">Administra usuarios, empleados, proveedores y más desde un solo lugar.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Registrarse</a>
        </div>
    </div>

</body>
</html>
