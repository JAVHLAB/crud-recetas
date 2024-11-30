<?php

namespace App\Http\Controllers;

use App\Models\receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class recetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar solo las recetas del usuario autenticado
        $receta = Receta::where('user_id', Auth::id())->get();
        return view('index', compact('receta'));
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
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'ingredientes' => 'nullable|string',
            'instrucciones' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048', // Validación para la imagen
        ]);

        // Crear una nueva receta con los datos del formulario
        $receta = new Receta();
        $receta->nombre = $request->input('nombre');
        $receta->descripcion = $request->input('descripcion');
        $receta->ingredientes = $request->input('ingredientes');
        $receta->instrucciones = $request->input('instrucciones');
        $receta->user_id = Auth::id(); // Asignar el ID del usuario autenticado

        // Manejo de la imagen (si se sube una)
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('recetas', 'public');
            $receta->imagen = $path;
        }

        // Guardar la receta en la base de datos
        $receta->save();

        // Redirigir a la lista de recetas con un mensaje de éxito
        return redirect()->route('receta.index')->with('success', 'Receta creada exitosamente.');
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