@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Puestos</h4>
                        <a href="{{ route('puestos.create') }}" class="btn btn-light btn-sm"><i class="bi bi-plus-lg"></i>
                            Nuevo Puesto</a>
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
                                        <th>Nombre del Puesto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            <td>{{ $puesto->id }}</td>
                                            <td>{{ $puesto->nombre }}</td>
                                            <td>
                                                <a href="{{ route('puestos.edit', $puesto->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST"
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