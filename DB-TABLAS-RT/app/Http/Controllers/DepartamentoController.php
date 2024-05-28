<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Propietario;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::with('propietario')->get();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        $propietarios = Propietario::all();
        return view('departamentos.create', compact('propietarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'renta' => 'required|numeric|min:0',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        Departamento::create([
            'direccion' => $request->direccion,
            'renta' => $request->renta,
            'propietario_id' => $request->propietario_id,
        ]);

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente');
    }

    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        $propietarios = Propietario::all();
        return view('departamentos.edit', compact('departamento', 'propietarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'renta' => 'required|numeric|min:0',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->update([
            'direccion' => $request->direccion,
            'renta' => $request->renta,
            'propietario_id' => $request->propietario_id,
        ]);

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente');
    }
}
