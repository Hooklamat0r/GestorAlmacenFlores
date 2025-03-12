@extends('layout')

@section('title', 'Editar Producto')

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h2 class="fw-bold text-primary text-center mb-4">✏️ Editar Producto</h2>
                
                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $producto->nombre }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">
                                Este campo es obligatorio y no puede superar los 30 carácteres.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Precio (€)</label>
                        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ (int) $producto->precio }}" required>
                        @error('precio')
                            <div class="invalid-feedback">
                                Este campo es obligatorio y debe ser un número inferior a 6 cifras.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ $producto->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoría</label>
                        <select name="categoria_id" class="form-select">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Previsualización de la imagen actual -->
                    @if($producto->imagen)
                        <div class="mb-3 text-center">
                            <p class="fw-bold">Imagen Actual:</p>
                            <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                 alt="Imagen actual" 
                                 class="rounded border shadow-sm" 
                                 width="120">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nueva Imagen (Opcional)</label>
                        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                        @error('imagen')
                            <div class="invalid-feedback">
                                Esta imagen es demasiado grande.
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">
                            💾 Guardar Cambios
                        </button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            ❌ Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
