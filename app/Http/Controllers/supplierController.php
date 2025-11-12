<?php

namespace App\Http\Controllers;

use App\Models\alsSupplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    //
    public function index()
    {
        $proveedor['als_suppliers'] = alsSupplier::paginate(5);
        return view('supplier.index', $proveedor);
    }
    public function create()
    {
        return view('supplier.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        $supplier = request()->except('_token');
        alsSupplier::insert($supplier);
        return redirect('/supplier')
        ->with('success', 'Proveedor creado correctamente.');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        // $supplier = alsSupplier::findOrFail($id);
        // return view('supplier.edit', compact('supplier'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'contact_email' => 'required|email|max:255',
        //     'phone_number' => 'required|string|max:20',
        //     'address' => 'required|string|max:255',
        // ]);
        // $supplier = request()->except(['_token', '_method']);
        // alsSupplier::where('id', '=', $id)->update($supplier);
        // return redirect()->route('supplier.index');
    }
    public function destroy($id)
    {
        
    }
}
