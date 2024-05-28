<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Models\Inquilino;
use App\Models\Departamento;

class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::with('departamento', 'inquilinos')->get();
        return view('alquileres.index', compact('alquileres'));
    }

    public function create()
    {
        $inquilinos = Inquilino::all();
        $departamentos = Departamento::all();
        return view('alquileres.create', compact('inquilinos', 'departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'inquilinos' => 'required|array',
            'inquilinos.*' => 'exists:inquilinos,id',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $alquiler = Alquiler::create([
            'monto' => $request->monto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'departamento_id' => $request->departamento_id,
        ]);

        $alquiler->inquilinos()->attach($request->inquilinos);

        return redirect()->route('alquileres.index')->with('success', 'Alquiler creado exitosamente');
    }

    public function show($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }

    public function edit($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $departamentos = Departamento::all();
        $inquilinos = Inquilino::all();
        return view('alquileres.edit', compact('alquiler', 'departamentos', 'inquilinos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'departamento_id' => 'required|exists:departamentos,id',
            'inquilinos' => 'required|array',
            'inquilinos.*' => 'exists:inquilinos,id',
        ]);

        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update($request->only('monto', 'fecha_inicio', 'fecha_fin', 'departamento_id'));
        $alquiler->inquilinos()->sync($request->inquilinos);

        return redirect()->route('alquileres.show', $alquiler->id)->with('success', 'Alquiler actualizado correctamente');
    }

    public function destroy($id)
    {
        Alquiler::findOrFail($id)->delete();
        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado correctamente');
    }
}
