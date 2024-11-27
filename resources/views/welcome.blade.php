<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="antialiased">
        <div class="footer">
        </div>
        <main class="header">
            <div class="contenedor">
                <div class="barra">
                    <a class="logo" href="#">
                        <h1 class="logo__nombre no-margin centrar-texto">Reci<span class="logo__bold">Peeeees</span></h1>
                    </a>

                    <nav class="navegacion">
                        <a href="{{ route('login') }}" class="navegacion__enlace">Login</a>   
                        <a href="{{ route('register') }}" class="navegacion__enlace">Register</a>                 
                    </nav>
                </div>
            </div>
            <div class="header__texto">
                <h2 class="no-margin">Recetario personal</h2>
                <p class="no-margin">Guarda y recuerda las mejores recetas y consejos</p>
            </div>
            </main>
            <footer class="footer_main">
                <div class="contenedor">
                    <div class="barra">
                        

                        <nav class="navegacion">
                            <p class="navegacion__enlace_footer">
                                 Derechos reservados Javier Mariscal
                            </p>
            
                        </nav>
                    </div>
                </div>
            </footer>
    </body>
</html>
