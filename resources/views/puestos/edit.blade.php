@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">Editar Puesto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Puesto</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                    name="nombre" value="{{ old('nombre', $puesto->nombre) }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('puestos.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection