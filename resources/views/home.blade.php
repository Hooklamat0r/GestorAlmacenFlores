@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow-lg border-0 w-50 text-center">
            <div class="card-body py-5">
                <h2 class="fw-bold text-primary">Bienvenido</h2>
                <p class="fs-5 text-muted">Selecciona una opción:</p>
                <div class="d-grid gap-3 mt-4">
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-lg">
                        📂 Ver Categorías
                    </a>
                    <a href="{{ route('productos.index') }}" class="btn btn-success btn-lg">
                        🛒 Ver Productos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
