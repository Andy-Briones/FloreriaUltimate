<?php

namespace App\Http\Controllers;

use App\Models\alsOrder;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
        $order['als_orders'] = alsOrder::paginate(5);
        return view('order.index', $order);
    }
}
