@extends('layouts.app')

@section('title','Entidades')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de entidades:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear entidades --}}

        <a href="{{route('entidades.create')}}">+ Nueva Entidad</a>

    {{-- Tabla para listar todas las entidades --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #ccc; padding: 8px">ID</th>
                <th style="border: 1px solid #ccc; padding: 8px">Nombre</th>
                <th style="border: 1px solid #ccc; padding: 8px">Tipo</th>
                <th style="border: 1px solid #ccc; padding: 8px">Responsable</th>
                <th style="border: 1px solid #ccc; padding: 8px">Fecha de Creación</th>
                <th style="border: 1px solid #ccc; padding: 8px">Fecha de Actualización</th>
                <th style="border: 1px solid #ccc; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($entidades as $entidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->id}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->nombre}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->tipo}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->responsable}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->created_at}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->updated_at}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('entidades.edit', $entidad->id)}}">Editar</a>
                        <form action="{{ route('entidades.destroy', $entidad->id) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar estas entidad?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        </td>
                    


                </tr>
            @endforeach

         

        </tbody>



    </table>



@endsection