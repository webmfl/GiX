@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">Nuevo Alumno</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('alumnos.store') }}">
                            @csrf

                            <ul class="nav nav-tabs mb-3" id="alumnoTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="alumno-tab" data-bs-toggle="tab"
                                        data-bs-target="#alumno" type="button" role="tab" aria-controls="alumno"
                                        aria-selected="true">Alumno</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="familia-tab" data-bs-toggle="tab" data-bs-target="#familia"
                                        type="button" role="tab" aria-controls="familia"
                                        aria-selected="false">Familia</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="alumnoTabContent">
                                <!-- Tab Alumno -->
                                <div class="tab-pane fade show active" id="alumno" role="tabpanel"
                                    aria-labelledby="alumno-tab">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nombre" class="form-label">Nombre Completo</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                            @error('nombre') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dni" class="form-label">DNI</label>
                                            <input type="text" class="form-control @error('dni') is-invalid @enderror"
                                                id="dni" name="dni" value="{{ old('dni') }}" required>
                                            @error('dni') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                                            <input type="date"
                                                class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                                id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}"
                                                required>
                                            @error('fecha_ingreso') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="matricula" class="form-label">N° Matrícula</label>
                                            <input type="text" class="form-control @error('matricula') is-invalid @enderror"
                                                id="matricula" name="matricula" value="{{ old('matricula') }}" required>
                                            @error('matricula') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="seccion_id" class="form-label">Sección</label>
                                            <select class="form-select @error('seccion_id') is-invalid @enderror"
                                                id="seccion_id" name="seccion_id" required>
                                                <option value="">Seleccione una sección</option>
                                                @foreach($secciones as $seccion)
                                                    <option value="{{ $seccion->id }}">{{ $seccion->nombre }} -
                                                        {{ $seccion->turno }}</option>
                                                @endforeach
                                            </select>
                                            @error('seccion_id') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                                id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                                            @error('telefono') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                                id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                                            @error('direccion') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="localidad" class="form-label">Localidad</label>
                                            <input type="text" class="form-control @error('localidad') is-invalid @enderror"
                                                id="localidad" name="localidad" value="{{ old('localidad') }}" required>
                                            @error('localidad') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="valor_cuota" class="form-label">Valor Cuota</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01"
                                                    class="form-control @error('valor_cuota') is-invalid @enderror"
                                                    id="valor_cuota" name="valor_cuota" value="{{ old('valor_cuota') }}"
                                                    required>
                                            </div>
                                            @error('valor_cuota') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="bonificacion" class="form-label">Bonificación (%)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('bonificacion') is-invalid @enderror"
                                                id="bonificacion" name="bonificacion" value="{{ old('bonificacion', 0) }}"
                                                required>
                                            @error('bonificacion') <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Familia -->
                                <div class="tab-pane fade" id="familia" role="tabpanel" aria-labelledby="familia-tab">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="padre" class="form-label">Nombre Padre</label>
                                            <input type="text" class="form-control" id="padre" name="padre"
                                                value="{{ old('padre') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dni_padre" class="form-label">DNI Padre</label>
                                            <input type="text" class="form-control" id="dni_padre" name="dni_padre"
                                                value="{{ old('dni_padre') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono_padre" class="form-label">Teléfono Padre</label>
                                            <input type="text" class="form-control" id="telefono_padre"
                                                name="telefono_padre" value="{{ old('telefono_padre') }}">
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="madre" class="form-label">Nombre Madre</label>
                                            <input type="text" class="form-control" id="madre" name="madre"
                                                value="{{ old('madre') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dni_madre" class="form-label">DNI Madre</label>
                                            <input type="text" class="form-control" id="dni_madre" name="dni_madre"
                                                value="{{ old('dni_madre') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono_madre" class="form-label">Teléfono Madre</label>
                                            <input type="text" class="form-control" id="telefono_madre"
                                                name="telefono_madre" value="{{ old('telefono_madre') }}">
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="hermanos" class="form-label">Hermanos (Nombres y edades)</label>
                                            <textarea class="form-control" id="hermanos" name="hermanos"
                                                rows="3">{{ old('hermanos') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Guardar Alumno</button>
                                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection