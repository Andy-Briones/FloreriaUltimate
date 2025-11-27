<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use App\Models\alsInsumo;
use App\Models\alsSupplier;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index(Request $request)
    {
        // Cargar relaciones correctas (por ejemplo: categories y supplier)
        $query = alsInsumo::with(['category', 'supplier']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $insumos = $query->paginate(5);

        return view('insumoss.index', compact('insumos'));
    }
    // 'productsGeneral.products.vistauser.secindex'
    // 'productsGeneral.products.index'

    public function create()
    {
        $categorys = alsCategory::all();   // todas las categorías
        $suppliers = alsSupplier::all();   // todos los proveedores

        return view('insumoss.create', [
            'Modo' => 'crearP',
            'categorys' => $categorys,
            'suppliers' => $suppliers
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'costo_unitario' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string|max:255',
            'tipo' => 'nullable|string|max:100',
            'unidad' => 'nullable|string|max:50',
            'estado' => 'required|string',
            'als_category_id' => 'required|exists:als_categories,id',
            'als_supplier_id' => 'required|exists:als_suppliers,id',
        ]);

        alsInsumo::create($validated);

        return redirect()->route('insumos.index')->with('success', 'Insumo agregado correctamente');
    }
    public function show()
    {
        //no se usa este metodo
    }
    public function edit($id)
    {
        $insumo = alsInsumo::findOrFail($id);
        $categorys = alsCategory::all();   // categorías
        $suppliers = alsSupplier::all();           // proveedores
        
        return view('insumoss.edit', [
        'insumo' => $insumo,
        'categorys' => $categorys,
        'suppliers' => $suppliers,
        'Modo' => 'editarI'
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'tipo' => 'nullable|string|max:100',
            'stock' => 'required|integer|min:0',
            'unidad' => 'nullable|string|max:50',
            'estado' => 'required|in:activo,inactivo',
            'costo_unitario' => 'required|numeric|min:0',
            'als_category_id' => 'required|exists:als_categories,id',
            'als_supplier_id' => 'required|exists:als_suppliers,id',
        ]);
        $insumo = request()->except(['_token', '_method']);
        alsInsumo::where('id', '=', $id)->update($insumo);
        return redirect()->route('insumos.index');
    }
    public function destroy($id)
    {
        $insumo = alsInsumo::findOrFail($id); // Ajusta según tu modelo
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Inventario eliminado correctamente');
    }
}
