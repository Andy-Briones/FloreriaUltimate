<?php

namespace App\Http\Controllers;

use App\Models\alsSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        return response()->json(['success' => true]);
    }
    public function show()
    {
        //no se usa este metodo
    }
    public function edit()
    {
        //no se usa este metodo
    }
    public function update()
    {
        //no se usa este metodo
    }
    public function destroy()
    {
        //no se usa este metodo
    }
}
