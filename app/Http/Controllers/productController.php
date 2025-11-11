<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use App\Models\alsProduct;
use App\Models\alsSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
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

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $products = $query->where('estado', 'activo')->latest()->paginate(8);

        // 👇 Usa una vista distinta si quieres (indexcli)
        return view('productGeneral.product.indexcli', compact('products'));
    }
    // public function indexcli(Request $request)
    // {
    //      // Vista del CLIENTE (con buscador y filtro)
    //     $query = alsProduct::query();

    //     if ($request->filled('search')) {
    //         $query->where('name', 'like', '%' . $request->search . '%')
    //             ->orWhere('description', 'like', '%' . $request->search . '%');
    //     }

    //     $products = $query->where('estado', 'activo')->latest()->get();

    //     return view('productGeneral.product.indexcli', compact('products'));
    // }

    public function create()
    {
        return view('productGeneral.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
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

    public function update(Request $request, $id)
    {
        $products = alsProduct::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $products->update($request->all());
        return redirect()->route('productGeneral.product.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        alsProduct::destroy($id);
        return redirect()->route('productGeneral.product.index')->with('success', 'Producto eliminado correctamente');
    }
    // public function index(Request $request)
    // {
    //     // Cargar relaciones correctas (por ejemplo: categories y supplier)
    //     $query = alsProduct::with(['category', 'supplier']);

    //     if ($request->filled('search')) {
    //         $search = $request->input('search');
    //         $query->where('name', 'like', "%{$search}%");
    //     }

    //     $products = $query->paginate(5);

    //     return view('productGeneral.product.index', compact('products'));
    // }
    // // 'productsGeneral.products.vistauser.secindex'
    // // 'productsGeneral.products.index'

    // public function create()
    // {
    //     $categorys = alsCategory::all();   // todas las categorías
    //     $suppliers = alsSupplier::all();   // todos los proveedores

    //     return view('productGeneral.product.create', [
    //         'Modo' => 'crearP',
    //         'categorys' => $categorys,
    //         'suppliers' => $suppliers
    //     ]);
    // }
    // public function store(Request $request)
    // {
    //     $product = request()->except('_token');
    //     $request->validate([
    //         'name'        => 'required|string|max:255',
    //         'price'       => 'required|numeric|min:0',
    //         'stock'       => 'required|integer|min:0',
    //     ]);
    //     alsproduct::insert($product);
    //     return redirect('products');//->with('mensaje', 'Categoría agregada con éxito');
    // }
    // public function show()
    // {
        
    // }
    // public function edit($id)
    // {
    //     $product = alsProduct::findOrFail($id);
    //     $categorys = alsCategory::all();   // categorías
    //     $suppliers = alsSupplier::all();           // proveedores
        
    //     return view('productGeneral.product.edit', [
    //     'products' => $product,
    //     'categorys' => $categorys,
    //     'suppliers' => $suppliers,
    //     'Modo' => 'editarP'
    //     ]);
    // }
    // public function update(Request $request, $id)
    // {
    //     $product = request()->except(['_token', '_method']);
    //     alsproduct::where('id', '=', $id)->update($product);
    //     return redirect()->route('productGeneral.product.index');
    // }
    // public function destroy($id)
    // {
        
    // }
}
