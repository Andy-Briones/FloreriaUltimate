<?php

namespace App\Http\Controllers;

use App\Models\alsProduct;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function index()
    {
        $product['als_products'] = alsProduct::paginate(5);
        return view('productGeneral.product.index', $product);
    }
}
