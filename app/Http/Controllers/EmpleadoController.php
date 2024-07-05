<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$request->validate([
        $validatedData = $request -> validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'puesto' => 'required',
            'departamento' => 'required',
        ]);

        //Empleado::create($request->all());
        Empleado::create($validatedData);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    //public function show($id)
    public function show(Empleado $empleado)
    {
       // $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit($id)
    public function edit(Empleado $empleado)
    {
        //$empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Empleado $empleado)
    {
        //$request->validate([
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'puesto' => 'required',
            'departamento' => 'required',
        ]);

       // $empleado = Empleado::findOrFail($id);
       // $empleado->update($request->all());
       $empleado->update($validatedData);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy($id)
    public function destroy(Empleado $empleado)
    {
       // $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado con éxito');
    }

    public function generarPdf($id)
{
    $empleado = Empleado::with('articulos')->findOrFail($id);
    $qrCode = QrCode::size(100)->generate(route('empleados.show', $empleado->id));

    $pdf = Pdf::loadView('empleados.pdf', compact('empleado', 'qrCode'));
    return $pdf->download('empleado_'.$empleado->id.'.pdf');
}

}
