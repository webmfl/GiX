@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">Editar Personal</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('personal.update', $personal->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                    name="nombre" value="{{ old('nombre', $personal->nombre) }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                    id="direccion" name="direccion" value="{{ old('direccion', $personal->direccion) }}"
                                    required>
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    id="telefono" name="telefono" value="{{ old('telefono', $personal->telefono) }}"
                                    required>
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $personal->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="puesto_id" class="form-label">Puesto</label>
                                <select class="form-select @error('puesto_id') is-invalid @enderror" id="puesto_id"
                                    name="puesto_id" required>
                                    <option value="">Seleccione un puesto</option>
                                    @foreach($puestos as $puesto)
                                        <option value="{{ $puesto->id }}" {{ $personal->puesto_id == $puesto->id ? 'selected' : '' }}>{{ $puesto->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('puesto_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sueldo" class="form-label">Sueldo</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01"
                                        class="form-control @error('sueldo') is-invalid @enderror" id="sueldo" name="sueldo"
                                        value="{{ old('sueldo', $personal->sueldo) }}" required>
                                </div>
                                @error('sueldo')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection