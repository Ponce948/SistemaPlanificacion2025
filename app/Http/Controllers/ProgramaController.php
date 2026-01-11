<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Mostrar todos las entidades almacenadas en base de datos
        $programas = Programas::all();
        return view('programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //Sirve para almacenar programas que primero han sido validadas

        // 1. valido las peticiones

        $request->validate([
            'id'=>'required|unique:programas,id',
            'nombrePrograma'=>'required|string',
            'tipoPrograma'=>'required|string',
            'categoria'=>'required|string',
        ]);

        // 2. Creo el programa en la base de datos

        Programas::create($request->all());

        return redirect()->route('programas.index')->with('success', "Programa creado satisfactoriamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $programa = Programas::findOrFail($id);
        return view('programas.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         //// 1. valido las peticiones

        $request->validate([
            
            'nombrePrograma'=>'required|string',
            'tipoPrograma'=>'required|string',
            'categoria'=>'required|string',
        ]);

        // 2. Creo la entidad en la base de datos

       $programas = Programas::findOrFail($id);
       $programas->update($request->all());

        return redirect()->route('programas.index')->with('success', "Programas auctualizada satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //Elimina un registro de la entidad

        $programas = Programas::findOrFail($id);
        $programas->delete();

        return redirect()->route('programas.index')->with('success', "Programa eliminado satisfactoriamente");

    }
}