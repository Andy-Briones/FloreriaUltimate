<?php

namespace App\Http\Controllers;

use App\Models\alsInsumo;
use App\Models\alsInventoryInsumo;
use App\Models\alsinvetory;
use Illuminate\Http\Request;

class InventarioInsumoController extends Controller
{
    public function index()
    {
        $detalles = alsInventoryInsumo::with(['insumo', 'inventario'])->get();
        return view('inventario_insumo.index', compact('detalles'));
    }

    public function create()
    {
        $insumos = alsInsumo::all();
        $inventarios = alsinvetory::all();
        return view('inventario_insumo.create', compact('insumos', 'inventarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'als_insumos_id' => 'required|exists:als_insumos,id',
            'alsinvetories_id' => 'required|exists:alsinvetories,id',
            'cantidad_usada' => 'required|integer|min:1',
        ]);

        alsInventoryInsumo::create($request->all());
        return redirect()->route('inventario_insumo.index')->with('success', 'Detalle registrado correctamente');
    }

}
