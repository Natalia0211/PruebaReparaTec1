<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicituds = Solicitud::all();
        return view('solicituds.index', compact('solicituds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('solicitudes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        Solicitud::create([
            'cliente_id' => $request->cliente_id,
            'dispositivo_id' => $request->dispositivo_id,
            'fecha_solicitud' => $request->fecha_solicitud,
            'descripcion_problema' => $request->descripcion_problema,
        ]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        return view('solicitudes.edit', compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        $solicitud->update([
            'cliente_id' => $request->cliente_id,
            'dispositivo_id' => $request->dispositivo_id,
            'fecha_solicitud' => $request->fecha_solicitud,
            'descripcion_problema' => $request->descripcion_problema,
        ]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada con éxito.');
    }
}
