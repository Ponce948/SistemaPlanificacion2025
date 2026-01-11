
@extends('layouts.app')

@section('title','Programas')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Programas:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear programas --}}

        <a href="{{route('programas.create')}}">+ Nuevo Programa</a>

    {{-- Tabla para listar todas los programas --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #ccc; padding: 8px">ID</th>
                <th style="border: 1px solid #ccc; padding: 8px">Programa</th>
                <th style="border: 1px solid #ccc; padding: 8px">Tipo</th>
                <th style="border: 1px solid #ccc; padding: 8px">Categoria</th>
                <th style="border: 1px solid #ccc; padding: 8px">Fecha de Creación</th>
                <th style="border: 1px solid #ccc; padding: 8px">Fecha de Actualización</th>
                <th style="border: 1px solid #ccc; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($programas as $programa)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->id}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->nombrePrograma}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->tipoPrograma}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->categoria}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->created_at}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->updated_at}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('programas.edit', $programa->id)}}">Editar</a>
                        <form action="{{ route('programas.destroy', $programa->id) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este programa?');">
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