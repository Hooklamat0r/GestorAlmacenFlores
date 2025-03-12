@extends('layout')

@section('title', 'Añadir Categoría')

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h2 class="fw-bold text-success text-center mb-4">➕ Añadir Nueva Categoría</h2>

                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre de la Categoría</label>
                        <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Ej: Libros" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">
                            💾 Guardar Categoría
                        </button>
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                            ❌ Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
