<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{   
    public function dashboard() 
    {
    $total = Licencia::count();

    $vigentes = Licencia::where('fecha_vencimiento', '>=', now())
        ->count();

    $vencidas = Licencia::where('fecha_vencimiento', '<', now())
        ->count();

    $ultimos = Licencia::latest()->take(5)->get();

    return view('dashboard', compact(
        'total',
        'vigentes',
        'vencidas',
        'ultimos'
    ));
    }
    public function index(Request $request)
    {
    $buscar = $request->buscar;

    $licencias = Licencia::where('nombre', 'LIKE', "%$buscar%")
        ->orWhere('apellido_paterno', 'LIKE', "%$buscar%")
        ->get();

    return view('licencias.index', compact('licencias'));

    }

    public function create()
    {
        return view('licencias.create');
    }

    public function store(Request $request)
    {
    $datos = $request->all();

    if($request->hasFile('foto')){

        $imagen = $request->file('foto');

        $nombre = time().'.'.$imagen->getClientOriginalExtension();

        $imagen->move(public_path('fotos'), $nombre);

        $datos['foto'] = $nombre;
    }

    Licencia::create($datos);

    return redirect()->route('licencias.index');
    }

    public function show(string $id)
    {
        $licencia = Licencia::findOrFail($id);
        return view('licencias.show', compact('licencia'));
    }

    public function edit(string $id)
    {
        $licencia = Licencia::findOrFail($id);
        return view('licencias.edit', compact('licencia'));
    }

    public function update(Request $request, string $id)
    {
        $licencia = Licencia::findOrFail($id);
        $licencia->update($request->all());

        return redirect()->route('licencias.index');
    }

    public function destroy(string $id)
    {
        $licencia = Licencia::findOrFail($id);
        $licencia->delete();

        return redirect()->route('licencias.index');
    }
}
