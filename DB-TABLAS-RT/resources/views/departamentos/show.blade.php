@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Departamento') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Dirección') }}</h5>
                <p class="card-text">{{ $departamento->direccion }}</p>

                <h5 class="card-title">{{ __('Renta') }}</h5>
                <p class="card-text">{{ $departamento->renta }}</p>

                <h5 class="card-title">{{ __('Propietario') }}</h5>
                <p class="card-text">{{ $departamento->propietario->nombre }} - {{ $departamento->propietario->email }}</p>

                <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                <a href="{{ route('departamentos.index') }}" class="btn btn-primary mt-7">{{ __('Volver') }}</a>
                <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
