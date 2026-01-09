@extends('layouts.app')

@section('title','Nueva Entidad')

@section('content')
    
    @if ($errors->any())
        <div>

            <ul>

                @foreach($errors->all() as $error)

                <li> - {{$error}} </li>

                @endforeach

            </ul>

        </div>
    @endif

        {{-- Formulario para la creación de entidades --}}

        <form action="{{ route ('entidades.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">ID</label>
                <input type="number" name="id" require value="{{ old('id') }}">
            </div>

             <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombre" require value="{{ old('nombre') }}">
            </div>

             <div>
                <label class="block">Tipo</label>
                <input type="text" name="tipo" require value="{{ old('tipo') }}">
            </div>

             <div>
                <label class="block">Responsable</label>
                <input type="text" name="responsable" require value="{{ old('responsable') }}">
            </div>

             <div>
                <label class="block">Fecha de Creación</label>
                <input type="date" name="created_at" require value="{{ old('created_at') }}">
            </div>

             <div>
                <label class="block">Fecha de Actualización</label>
                <input type="date" name="updated_at" require value="{{ old('updated_at') }}">
            </div>

            <button type="submit">Guardar</button>

            <a href="{{route('entidades.index')}}">Volver</a>
            
        </form>




@endsection