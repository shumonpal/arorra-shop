<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {

        return $request->all();
        $order = Order::create([
            'payer_id' => $request['PAYERID'],
            'user_id' => auth()->user()->id,
            'invoice_id' => $request['INVNUM'],
            'invoice_description' => $request['DESC'],
            'payer_email' => auth()->user()->email,
            'status' => $request['ACK'] == 'success' ? 0 : 1,
            'pay_method' => session('payment_method'),
            'shipping_method' => session('shipping_method'),
            'total' => $request['AMT'],
        ]);
        $order_content = [];
        foreach ($carts as $cart) {
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
