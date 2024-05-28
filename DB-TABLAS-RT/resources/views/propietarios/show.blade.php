@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Propietario') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nombre') }}</h5>
                <p class="card-text">{{ $propietario->nombre }}</p>

                <h5 class="card-title">{{ __('Correo Electrónico') }}</h5>
                <p class="card-text">{{ $propietario->email }}</p>

                <a href="{{ route('propietarios.edit', $propietario->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                <a href="{{ route('propietarios.index') }}" class="btn btn-success mt-7">{{ __('Volver') }}</a>
                <form action="{{ route('propietarios.destroy', $propietario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
