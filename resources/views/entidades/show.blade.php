@extends('layouts.app')

@section('title', 'Ver Usuario')

@section('content')
    <h1>Detalles del Usuario</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $usuario->id }}</h5>
            <p class="card-text"><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $usuario->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $usuario->telefono ?? 'N/A' }}</p>
            <p class="card-text"><strong>Creado:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Actualizado:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>

            <div class="mt-3">
                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                </form>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection