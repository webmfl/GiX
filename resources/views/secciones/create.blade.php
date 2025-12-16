@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">Nueva Sección</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('secciones.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Sección</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                    name="nombre" value="{{ old('nombre') }}" required placeholder="Ej: 1er Grado A">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select @error('turno') is-invalid @enderror" id="turno" name="turno"
                                    required>
                                    <option value="">Seleccione un turno</option>
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
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
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('personal_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('secciones.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection