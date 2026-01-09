<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return '✅ UsuarioController funciona';
    }
    
    public function create()
    {
        return 'Formulario crear';
    }
    
    public function store(Request $request)
    {
        return 'Guardar';
    }
    
    public function show($id)
    {
        return 'Mostrar ' . $id;
    }
    
    public function edit($id)
    {
        return 'Editar ' . $id;
    }
    
    public function update(Request $request, $id)
    {
        return 'Actualizar ' . $id;
    }
    
    public function destroy($id)
    {
        return 'Eliminar ' . $id;
    }
}