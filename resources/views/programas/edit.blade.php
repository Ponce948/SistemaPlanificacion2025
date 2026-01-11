@extends('layouts.app')

@section('title','Editar')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar las Programas</h2>

    {{-- Formulario para la edición de programas --}}

        <form action="{{ route ('programas.update' , $programa->id )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            

             <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombrePrograma" require value="{{ old('nombrePrograma', $programa->nombrePrograma) }}" >
            </div>

             <div>
                <label class="block">Tipo</label>
                <input type="text" name="tipoPrograma" require value="{{ old('tipoPrograma', $programa->tipoPrograma) }}">
            </div>

             <div>
                <label class="block">Categoria</label>
                <input type="text" name="categoria" require value="{{ old('responsable', $programa->categoria) }}">
            </div>

             
            <button type="submit">Actualizar</button>

            <a href="{{route('programas.index')}}">Volver</a>
            
        </form>



@endsection