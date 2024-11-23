<?php

namespace App\Http\Controllers;

use App\Models\receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class recetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receta = receta::all(); // Obtén todas las recetas
        return view('index', compact('receta')); // Pasa las recetas a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la imagen
        ]);
    
        // Subir la imagen al sistema de archivos
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_recetas', 'public');
            $validated['imagen'] = $rutaImagen;
        }
    
        // Crear la receta
        receta::create($validated);
    
        return redirect()->route('receta.index')->with('success', '¡Receta creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Obtener la receta por su id
    $receta = Receta::findOrFail($id); // O puedes usar first() si estás buscando por un campo específico

    // Pasar la receta a la vista
    return view('view', compact('receta'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la receta por ID
        $receta = Receta::findOrFail($id);
        
        // Retornar la vista de edición con los datos de la receta
        return view('edit', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Obtener la receta por ID
    $receta = Receta::findOrFail($id);

    // Validar los datos del formulario
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'ingredientes' => 'required|string',
        'instrucciones' => 'required|string',
        'imagen' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    // Actualizar los datos de la receta
    $receta->nombre = $validated['nombre'];
    $receta->descripcion = $validated['descripcion'];
    $receta->ingredientes = $validated['ingredientes'];
    $receta->instrucciones = $validated['instrucciones'];

    // Si se sube una nueva imagen, actualizarla
    if ($request->hasFile('imagen')) {
    // Eliminar la imagen antigua si existe
    if ($receta->imagen) {
        Storage::delete('public/imagenes_recetas/' . $receta->imagen);
    }

    // Subir la nueva imagen
    $rutaImagen = $request->file('imagen')->store('imagenes_recetas', 'public');
    $receta->imagen = $rutaImagen;

}



    // Guardar los cambios en la receta
    $receta->save();

    // Redirigir o mostrar un mensaje de éxito
    return redirect()->route('receta.index')->with('success', 'Receta actualizada exitosamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $receta = Receta::find($id);
        
        if ($receta) {
            $receta->delete();
            return redirect()->route('receta.index')->with('success', 'Receta eliminada exitosamente.');
        }
    
        return redirect()->route('receta.index')->with('error', 'Receta no encontrada.');
    }
}