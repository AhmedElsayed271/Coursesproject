<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        
        $orders = Order::with('user','course')->Paginate(10);


        return view('dashboard.order.index',compact('orders'));

    }
}
