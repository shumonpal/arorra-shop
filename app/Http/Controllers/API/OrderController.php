<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {

        return $request->all();
        $order = Order::create([
            'payer_id' => $request['PAYERID'],
            'user_id' => Auth::guard('api')->user()->id,
            'invoice_id' => $request['invoice_id'],
            'invoice_description' => $request['DESC'],
            'payer_email' => Auth::guard('api')->user()->email,
            'status' =>  1,
            'pay_method' => $request['payment_method'],
            'shipping_method' => $request['shipping_method'],
            'total' => $request['total'],
        ]);
        $order_content = [];
        foreach ($request->carts as $cart) {
            $order_content[] = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'size' => $cart->size,
                'color' => $cart->color,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
        }

        DB::table('order_content')->insert($order_content);
    }

    public function getOrder($id)
    {
        return $id;
    }
}
