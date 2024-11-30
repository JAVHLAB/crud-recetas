@extends('layouts.base')

@section('content')
<div class="contenedor contenido-principal">
    <main class="Blog">
        <h3>Recetas</h3>
        @if($receta->isEmpty())
            <!-- Mensaje si no hay recetas -->
            <p>No hay recetas disponibles en este momento. ¡Añade la primera receta para que aparezca aquí!</p>
        @else
            @foreach($receta as $item)
                <article class="entrada">
                    <h4 class="no-margin">{{ $item->nombre }}</h4>
                    <div class="entrada__imagen">
                        <!-- Mostrar la imagen o una por defecto -->
                        @if(file_exists(public_path('storage/'.$item->imagen)) && $item->imagen)
                            <img src="{{ url('storage/'.$item->imagen) }}" alt="Imagen de {{ $item->nombre }}">
                        @else
                            <img loading="lazy" src="{{ asset('img/blog2.jpg') }}" alt="Imagen por defecto">
                        @endif
                    </div>
                    <div class="entrada__contenido">
                        <p>{{ $item->descripcion ?? 'Sin descripción disponible' }}</p>
                        <a href="{{ route('receta.show', $item->id) }}" class="boton boton--primario">Ver Receta</a>
                    </div>
                </article>
            @endforeach
        @endif
    </main>
</div>
@endsection

