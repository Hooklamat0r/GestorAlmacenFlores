@extends('layout')

@section('title', 'Productos')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">🛒 Productos</h2>
            <a href="{{ route('productos.create') }}" class="btn btn-success">
                ➕ Añadir Producto
            </a>
        </div>

        @if($productos->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="fw-bold">📦 No hay productos disponibles</h4>
                <p>Agrega productos para que aparezcan aquí.</p>
            </div>
        @else
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>
                                        @if($producto->imagen)
                                            <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                                 alt="Imagen del producto" 
                                                 class="rounded" 
                                                 width="150">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td class="fw-bold text-success">{{ number_format($producto->precio, 2) }}€</td>
                                    <td>{{ \Str::limit($producto->descripcion, 20) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                                                ✏️ Editar
                                            </a>
                                            &nbsp;
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    🗑️ Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $productos->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
