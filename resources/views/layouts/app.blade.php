<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        #navbar {
            background-color: gray !important;
            max-height: 75px;

            & #navUl {
                display: flex;
                justify-content: space-around;
                list-style: none;

                & li > a {
                    color: white;
                    text-decoration: none;
                }
            }
        }
    </style>
</head>

<body>
    <nav class="p-4" id="navbar">
        <ul id="navUl">
            <li>
                <a href="{{ route('proyectos.index') }}">Proyectos</a>
            </li>
            <li>
                <a href="{{ route('tareas.index') }}">Tareas</a>
            </li>
            <li>
                <a href="{{ route('trabajadores.index') }}">Trabajadores</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        @yield('content')  <!-- Esta sección es donde se mostrará el contenido específico de cada vista -->
    </div>

    <!-- Puedes agregar tus scripts aquí -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>