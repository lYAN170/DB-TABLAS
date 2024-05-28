@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Propietarios') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('propietarios.create') }}" class="btn btn-primary">{{ __('Agregar Propietario') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Correo Electrónico') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($propietarios as $propietario)
                                <tr>
                                    <td>{{ $propietario->nombre }}</td>
                                    <td>{{ $propietario->email }}</td>
                                    <td>
                                        <a href="{{ route('propietarios.show', $propietario->id) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                        <a href="{{ route('propietarios.edit', $propietario->id) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                        <form action="{{ route('propietarios.destroy', $propietario->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
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
@endsection

