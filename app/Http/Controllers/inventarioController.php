<?php

namespace App\Http\Controllers;

use App\Models\alsInsumo;
use App\Models\alsInventoryInsumo;
use App\Models\alsinvetory;
use App\Models\alsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inventarioController extends Controller
{
    //
    public function index()
    {
        $inventarios = alsinvetory::with('products')->latest()->get();
        return view('inventario.index', compact('inventarios'));
    }

    public function create()
    {
        $insumos = AlsInsumo::where('estado', 'activo')->get();
        return view('inventario.create', compact('insumos'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'insumos' => 'required|array',
                'insumos.*.id' => 'required|exists:als_insumos,id',
                'insumos.*.cantidad_usada' => 'required|integer|min:1',
            ]);

            // Crear registro de inventario
            $inventario = alsinvetory::create([
                'descripcion' => $request->descripcion ?? null,
                'costo_total' => 0,
                'cantidad_usada' => 0,
            ]);

            $costoTotal = 0;

            foreach ($request->insumos as $item) {
                $insumo = AlsInsumo::findOrFail($item['id']);
                $cantidad = $item['cantidad_usada'];

                if ($insumo->stock < $cantidad) {
                    throw new \Exception("No hay suficiente stock de {$insumo->nombre}");
                }

                // Descontar stock
                $insumo->decrement('stock', $cantidad);

                // Registrar detalle
                AlsInventoryInsumo::create([
                    'als_insumos_id' => $insumo->id,
                    'alsinvetories_id' => $inventario->id,
                    'cantidad_usada' => $cantidad,
                ]);

                $costoTotal += $insumo->costo_unitario * $cantidad;
            }

            // Actualizar inventario
            $inventario->update([
                'costo_total' => $costoTotal,
                'cantidad_usada' => collect($request->insumos)->sum('cantidad_usada'),
            ]);

            // Crear producto
            AlsProduct::create([
                'name' => $request->name,
                'description' => $request->description ?? null,
                'price' => $request->price,
                'stock' => $request->stock ?? 1,
                'image_path' => $request->image_path ?? null,
                'costo_produccion' => $costoTotal,
                'estado' => 'activo',
                'alsinvetories_id' => $inventario->id,
            ]);

            DB::commit();
            return redirect()->route('inventario.index')->with('success', 'Producto e inventario creados correctamente.');


        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $inventario = alsinvetory::with(['insumos', 'products'])->findOrFail($id);
        return view('inventario.show', compact('inventario'));
    }

    //Consulta detalle
    public function detalle($id)
    {
        $inventario = Alsinvetory::with('insumos')->findOrFail($id);
        return view('inventario.detalle', compact('inventario'));
    }

}
