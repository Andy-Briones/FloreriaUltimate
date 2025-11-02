<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use App\Models\alsInsumo;
use App\Models\alsSupplier;
use Illuminate\Http\Request;

class insumoController extends Controller
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
        $insumo = request()->except('_token');
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'costo_unitario'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);
        alsInsumo::insert($insumo);
        return redirect('insumos');//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        $insumo = alsInsumo::findOrFail($id);
        $categorys = alsCategory::all();   // categorías
        $suppliers = alsSupplier::all();           // proveedores
        
        return view('insumoss.edit', [
        'insumos' => $insumo,
        'categorys' => $categorys,
        'suppliers' => $suppliers,
        'Modo' => 'editarP'
        ]);
    }
    public function update(Request $request, $id)
    {
        $insumo = request()->except(['_token', '_method']);
        alsInsumo::where('id', '=', $id)->update($insumo);
        return redirect()->route('insumoss.index');
    }
    public function destroy($id)
    {
        
    }
}
