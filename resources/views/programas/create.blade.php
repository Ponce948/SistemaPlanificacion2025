@extends('layouts.app')

@section('title','Nuevos Programas')

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

        {{-- Formulario para la creación de programas --}}

        <form action="{{ route ('programas.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">ID</label>
                <input type="number" name="id" require value="{{ old('id') }}">
            </div>

             <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombrePrograma" require value="{{ old('nombrePrograma') }}">
            </div>

             <div>
                <label class="block">Tipo</label>
                <input type="text" name="tipoPrograma" require value="{{ old('tipoPrograma') }}">
            </div>

             <div>
                <label class="block">Categoria</label>
                <input type="text" name="categoria" require value="{{ old('categoria') }}">
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

            <a href="{{route('programas.index')}}">Volver</a>
            
        </form>




@endsection