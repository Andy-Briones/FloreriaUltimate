<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
     public function index()
    {
        $categoria['als_categories'] = alsCategory::paginate(5);
        return view('productGeneral.productCategory.index', $categoria);
    }
    public function create()
    {
        return view('productGeneral.productCategory.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
    ]);
        $categoria = $request->except('_token');
        alsCategory::insert($categoria);
        return response()->json(['success' => true]);//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        //No se usa de momento
    }
    public function edit($id)
    {
        $categoria = alsCategory::findOrFail($id);
        return view('productGeneral.productCategory.edit', compact('categoria'));
    }
    public function update()
    {
        //no se usa el metodo editar caracteristica
    }
    public function destroy()
    {
        //no se usa este metodo
    }
}
