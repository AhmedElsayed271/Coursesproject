<?php

namespace App\Service;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderService 
{
    public static function makeOrder($request) 
    {
        $validated = Validator::make($request->all(),[
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'price' => 'required',
            'currency' => 'required',
            'payment_method' => 'required',
            'payment_type' => 'required',
        ]);

        if ($validated->fails())
        {
            return $validated->errors();
        }


        $order = Order::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'price' => $request->price,
            'currency' => $request->currency,
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type,
        ]);

        return $order;
    }
}