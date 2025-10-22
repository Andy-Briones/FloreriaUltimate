<?php

namespace App\Http\Controllers;

use App\Models\alsCategory;
use Illuminate\Http\Request;

class categoryController extends Controller
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
        $categoria = $request->except('_token');
        alsCategory::insert($categoria);
        return redirect()->json(['success' => true]);//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        $categoria = alsCategory::findOrFail($id);
        return view('productGeneral.productCategory.edit', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $categoria = $request->except('_token', '_method');
        alsCategory::where('id', '=', $id)->update($categoria);
        return redirect()->route('productGeneral.productCategory.index');
    }
    public function destroy($id)
    {
        
    }
}
