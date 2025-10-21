<?php

namespace App\Http\Controllers;

use App\Models\alsSupplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    //
    public function index()
    {
        $supplier['als_suppliers'] = alsSupplier::paginate(5);
        return view('supplier.index', $supplier);
    }
}
