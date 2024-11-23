<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Reci<span class="logo__bold">Peeeees</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="{{ route('receta.create') }}" class="navegacion__enlace">Crear nueva</a>
                    <a href="nosotros.html" class="navegacion__enlace">info</a>                    
                </nav>
            </div>
        </div>
        <div class="header__texto">
            <h2 class="no-margin">Recetario personal</h2>
            <p class="no-margin">Guarda y recuerda las mejores recetas y consejos</p>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
    
    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Reci<span class="logo__bold">Peeeees</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="{{ route('receta.create') }}" class="navegacion__enlace">Crear nueva</a>
                    <a href="nosotros.html" class="navegacion__enlace">info</a> 
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>