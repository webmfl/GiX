@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Personal</h4>
                        <a href="{{ route('personal.create') }}" class="btn btn-light btn-sm"><i class="bi bi-plus-lg"></i>
                            Nuevo Personal</a>
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
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Puesto</th>
                                        <th>Sueldo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal as $persona)
                                        <tr>
                                            <td>{{ $persona->id }}</td>
                                            <td>{{ $persona->nombre }}</td>
                                            <td>{{ $persona->direccion }}</td>
                                            <td>{{ $persona->telefono }}</td>
                                            <td>{{ $persona->email }}</td>
                                            <td><span class="badge bg-info text-dark">{{ $persona->puesto->nombre }}</span></td>
                                            <td>${{ number_format($persona->sueldo, 2) }}</td>
                                            <td>
                                                <a href="{{ route('personal.edit', $persona->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('personal.destroy', $persona->id) }}" method="POST"
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