@extends('layouts.base')

@section('content')
<main class="contenedor">
    <h3 class="centrar-texto">{{ $receta->nombre }}</h3> <!-- Mostramos el nombre de la receta -->
    
    <div class="entrada">
        <div class="entrada__imagen">
            <!-- Mostrar la imagen de la receta, si existe -->
            @if($receta->imagen)
                <img src="{{ url('storage/' . $receta->imagen) }}" alt="Imagen de {{ $receta->nombre }}">
            @else
                <img src="{{ asset('img/placeholder.jpg') }}" alt="Imagen por defecto">
            @endif
        </div>

        <div class="entrada__info">
            <!-- Mostrar la descripción de la receta -->
            <h4>Ingredientes:</h4>
            <p>{{ $receta->ingredientes }}</p>

            <h4>Procedimiento:</h4>
            <p>{{ $receta->instrucciones }}</p>

            <!-- Botones para modificar o eliminar -->
            <a href="{{ route('receta.edit', $receta->id) }}" class="boton boton--primario">Modificar</a>
            <form action="{{ route('receta.destroy', $receta->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE') <!-- Esto indica que el formulario está enviando una solicitud DELETE -->
                <button type="submit" class="boton boton--secundario" 
                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta receta?')">
                    Eliminar
                </button>
            </form>

        </div>
    </div>
</main>
@endsection
