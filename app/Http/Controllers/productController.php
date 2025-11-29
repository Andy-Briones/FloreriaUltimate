<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use App\Models\alsProduct;
use App\Models\alsSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Auth::user(); // puede ser null si es público

        // Si el usuario está logueado y es ADMIN → vista completa
        if ($user && $user->role == 'admin') {
            $products = alsProduct::with('inventario')->latest()->paginate(8);
            return view('productGeneral.product.index', compact('products'));
        }

        // CLIENTE o PÚBLICO → solo productos activos con buscador
        $query = alsProduct::query();

        $search = $request->input('search');
        $onlyDescription = $request->has('only_description'); // nuevo checkbox

        if ($search) {
            if ($onlyDescription) {
                // Busca SOLO en descripción
                $query->where('description', 'like', '%' . $search . '%');
            } else {
                // Busca en nombre Y descripción (como antes)
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            }
        }

        $products = $query->where('estado', 'activo')->latest()->paginate(8);

        // 👇 Usa una vista distinta si quieres (indexcli)
        return view('productGeneral.product.indexcli', compact('products'));
    }

    public function create()
    {
        return view('productGeneral.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'estado' => 'nullable|in:activo,inactivo',
        ]);

        alsProduct::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'estado' => 'activo',
        ]);

        return redirect()->route('products.index')->with('success', 'Producto agregado correctamente');
    }

    public function edit($id)
    {
        $producto = alsProduct::findOrFail($id);
        return view('productGeneral.product.edit', compact('producto'));
    }

    public function update()
    {
        //no se usa este metodo
    }

    public function destroy($id)
    {
        alsProduct::destroy($id);
        return redirect()->route('productGeneral.product.index')->with('success', 'Producto eliminado correctamente');
    }
}
