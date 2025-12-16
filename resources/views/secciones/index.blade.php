@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Secciones</h4>
                        <a href="{{ route('secciones.create') }}" class="btn btn-light btn-sm"><i class="bi bi-plus-lg"></i>
                            Nueva Sección</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sección</th>
                                        <th>Turno</th>
                                        <th>Docente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secciones as $seccion)
                                        <tr>
                                            <td>{{ $seccion->id }}</td>
                                            <td>{{ $seccion->nombre }}</td>
                                            <td>
                                                @if($seccion->turno == 'Mañana')
                                                    <span class="badge bg-warning text-dark">Mañana</span>
                                                @else
                                                    <span class="badge bg-info text-dark">Tarde</span>
                                                @endif
                                            </td>
                                            <td>{{ $seccion->personal->nombre ?? 'Sin Asignar' }}</td>
                                            <td>
                                                <a href="{{ route('secciones.edit', $seccion->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('secciones.destroy', $seccion->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Estás seguro?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection