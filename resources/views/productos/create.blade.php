@extends('layout')

@section('title', 'Añadir Producto')

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h2 class="fw-bold text-primary text-center mb-4">🆕 Añadir Nuevo Producto</h2>
                
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="nombre">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Ej: Portatil" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">
                                Este campo es obligatorio y no puede superar los 30 carácteres.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="precio">Precio (€)</label>
                        <input type="number" step="0.01" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="Ej: 999.99" value="{{ old('precio') }}" required>
                        @error('precio')
                            <div class="invalid-feedback">
                                Este campo es obligatorio y debe ser un número inferior a 6 cifras.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3" placeholder="Describe el producto" required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" required>
                            <option selected disabled>Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="imagen">Imagen del Producto</label>
                        <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                        @error('imagen')
                            <div class="invalid-feedback">
                                Esta imagen es demasiado grande.
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">
                            💾 Guardar Producto
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
