@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">Editar Sección</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('secciones.update', $seccion->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Sección</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                    name="nombre" value="{{ old('nombre', $seccion->nombre) }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select @error('turno') is-invalid @enderror" id="turno" name="turno"
                                    required>
                                    <option value="Mañana" {{ $seccion->turno == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                                    <option value="Tarde" {{ $seccion->turno == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                                </select>
                                @error('turno')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="personal_id" class="form-label">Docente a Cargo</label>
                                <select class="form-select @error('personal_id') is-invalid @enderror" id="personal_id"
                                    name="personal_id" required>
                                    <option value="">Seleccione un docente</option>
                                    @foreach($personal as $docente)
                                        <option value="{{ $docente->id }}" {{ $seccion->personal_id == $docente->id ? 'selected' : '' }}>{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('personal_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('secciones.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection