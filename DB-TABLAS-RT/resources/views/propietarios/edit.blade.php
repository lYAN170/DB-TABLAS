@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Propietario') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('propietarios.update', $propietario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $propietario->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Correo Electrónico') }}</label>
                        <input type="email" name="email" class="form-control" value="{{ $propietario->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                    <a href="{{ route('propietarios.index') }}" class="btn btn-success mt-7">{{ __('Volver') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection
