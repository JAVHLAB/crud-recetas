@extends('layouts.base')

@section('content')
<main class="contenedor">
    <h3 class="centrar-texto">Modificar Receta</h3>

    <div class="contacto--bg"></div>

    <!-- Formulario para actualizar la receta -->
    <form class="formulario" action="{{ route('receta.update', $receta->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Indicamos que es una actualización -->
        
        <div class="campo">
            <label class="campo__label" for="nombre">Nombre de la receta</label>
            <input class="campo__field" type="text" placeholder="Nombre de la receta" id="nombre" name="nombre" value="{{ old('nombre', $receta->nombre) }}">
        </div>

        <div class="campo">
            <label class="campo__label" for="descripcion">Descripción</label>
            <textarea class="campo__field campo__field--textarea" id="descripcion" name="descripcion" placeholder="Descripción de la receta">{{ old('descripcion', $receta->descripcion) }}</textarea>
        </div>

        <div class="campo">
            <label class="campo__label" for="ingredientes">Ingredientes</label>
            <textarea class="campo__field campo__field--textarea" id="ingredientes" name="ingredientes" placeholder="Lista de ingredientes (separados por coma)">{{ old('ingredientes', $receta->ingredientes) }}</textarea>
        </div>

        <div class="campo">
            <label class="campo__label" for="instrucciones">Instrucciones</label>
            <textarea class="campo__field campo__field--textarea" id="instrucciones" name="instrucciones" placeholder="Instrucciones para preparar la receta">{{ old('instrucciones', $receta->instrucciones) }}</textarea>
        </div>

        <div class="campo">
            <label class="campo__label" for="imagen">Imagen de la receta</label>
            <input class="campo__field" type="file" id="imagen" name="imagen">
            <small>Dejar en blanco si no desea cambiar la imagen.</small>
            @if ($errors->has('imagen'))
                <div class="alert alert-danger">
                    {{ $errors->first('imagen') }}
                </div>
            @endif
        </div>

        <div class="campo">
            <input type="submit" value="Actualizar Receta" class="boton boton--primario">
        </div>
    </form>
</main>
@endsection
