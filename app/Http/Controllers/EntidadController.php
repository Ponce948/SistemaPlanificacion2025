<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Unique;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todos las entidades almacenadas en base de datos
        $entidades = Entidad::all();
        return view('entidades.index', compact('entidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Que permite llamar al formulario para crear entidades
        return view('entidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Sirve para almacenar entidades que primero han sido validadas

        // 1. valido las peticiones

        $request->validate([
            'id'=>'required|unique:entidades,id',
            'nombre'=>'required|string',
            'tipo'=>'required|string',
            'responsable'=>'required|string',
        ]);

        // 2. Creo la entidad en la base de datos

        Entidad::create($request->all());

        return redirect()->route('entidades.index')->with('success', "Entidad creadad satisfactoriamente");

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
        //Llama al formulario para editar la informacion

        $entidades = Entidad::findOrFail($id);
        $entidad = Entidad::findOrFail($id);
        return view('entidades.edit', compact('entidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //// 1. valido las peticiones

        $request->validate([
            'id'=>'required|unique:entidades,id',
            
            'nombre'=>'required|string',
            'tipo'=>'required|string',
            'responsable'=>'required|string',
        ]);

        // 2. Creo la entidad en la base de datos

       $entidades = Entidad::findOrFail($id);
       $entidades->update($request->all());

        return redirect()->route('entidades.index')->with('success', "Entidad auctualizada satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Elimina un registro de la entidad

        $entidades = Entidad::findOrFail($id);
        $entidades->delete();

        return redirect()->route('entidades.index')->with('success', "Entidad eliminada satisfactoriamente");

    }
    }
