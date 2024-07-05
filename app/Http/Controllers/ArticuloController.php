<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Empleado;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articulos = Articulo::with('empleado')->get();
        $articulo = Articulo::all();
        return view('articulos.index', compact('articulos'));
    }

    // Mostrar el formulario para crear un nuevo artículo
    public function create()
    {
        $empleados = Empleado::all();
        return view('articulos.create', compact('empleados'));
    }

    // Almacenar un nuevo artículo en la base de datos
    public function store(Request $request)
    {
        //$request->validate([
        $validatedData = $request->validate([
            'tipo' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'serie' => 'required|unique:articulos',
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        //Articulo::create($request->all());
        Articulo::create($validatedData);
        return redirect()->route('articulos.index')->with('success', 'Artículo creado con éxito');
    }

    // Mostrar un artículo específico
    //public function show($id)
    public function show(Articulo $articulo)
    {
        //$articulo = Articulo::with('empleado')->findOrFail($id);
        return view('articulos.show', compact('articulo'));
    }

    // Mostrar el formulario para editar un artículo
    //public function edit($id)
    public function edit(Articulo $articulo)
    {
        //$articulo = Articulo::findOrFail($id);
        $empleados = Empleado::all();
        return view('articulos.edit', compact('articulo', 'empleados'));
    }

    // Actualizar un artículo específico en la base de datos
    //public function update(Request $request, $id)
    public function update(Request $request, Articulo $articulo)
    {
        //$request->validate([
        $validatedData = $request->validate([
            'tipo' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            //'serie' => 'required|unique:articulos,serie,'.$id,
            'serie' => 'required|unique:articulos,serie,'.$articulo->Id,
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        //$articulo = Articulo::findOrFail($id);
        //$articulo->update($request->all());
        $articulo->update($validatedData);
        return redirect()->route('articulos.index')->with('success', 'Artículo actualizado con éxito');
    }

    // Eliminar un artículo específico de la base de datos
    //public function destroy($id)
    public function destroy(Articulo $articulo)
    {
        //$articulo = Articulo::findOrFail($id);
        $articulo->delete();
        return redirect()->route('articulos.index')->with('success', 'Artículo eliminado con éxito');
    }
}
