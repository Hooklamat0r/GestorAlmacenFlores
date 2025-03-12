@extends('layout')

@section('title', 'Categorías')

@section('content')
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-4">📂 Gestión de Categorías</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fs-5">Lista de categorías registradas</span>
            <a href="{{ route('categorias.create') }}" class="btn btn-success">
                ➕ Añadir Categoría
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($categorias->isEmpty())
            <div class="alert alert-info text-center">
                📂 No hay categorías registradas en este momento.
            </div>
        @else
            <ul class="list-group shadow-sm">
                @foreach($categorias as $categoria)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>{{ $categoria->nombre }}</strong>
                        <div>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
