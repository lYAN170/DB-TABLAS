@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Departamento') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="direccion">{{ __('Dirección') }}</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $departamento->direccion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="renta">{{ __('Renta') }}</label>
                        <input type="number" step="0.01" name="renta" class="form-control" value="{{ $departamento->renta }}" required>
                    </div>
                    <div class="form-group">
                        <label for="propietario_id">{{ __('Propietario') }}</label>
                        <select name="propietario_id" class="form-control" required>
                            @foreach($propietarios as $propietario)
                                <option value="{{ $propietario->id }}" @if($propietario->id == $departamento->propietario_id) selected @endif>{{ $propietario->nombre }} - {{ $propietario->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                    <a href="{{ route('departamentos.index') }}" class="btn btn-primary mt-7">{{ __('Volver') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection
