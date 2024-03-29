<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use DB;
use Auth;
use Carbon\Carbon;
use App\Frontend\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->saveOrder($request);            
        $orders = Order::where('customer_id', Auth::guard('customer_guard')->user()->id)->orderBy('created_at', 'desc')->get();
        
        if ($orders->count() < 1) {
            return redirect(url('/'));
        }
        return view('frontend.orders.order', ['orders' => $orders]);
        
    }


    public function saveOrder($request)
    {
        if (session('payment') == 'cash') {
                
            $orders = array();

            foreach(Cart::instance('cart')->content() as $carts){
                $orders[] = [
                        'customer_id' => Auth::guard('customer_guard')->user()->id,
                        'product_id' => $carts->id,
                        'order_id' => date('mydi'),
                        'qty' => $carts->qty,
                        'color' => $carts->color,
                        'paymethod' => session('payment'),
                        'total' => Cart::instance('cart')->total(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        ];
            }
            DB::table('orders')->insert($orders);
            Cart::instance('cart')->destroy();
            $request->session()->forget(['shipping_address', 'shipping_method', 'shipping_method_cmnt', 'payment_method']);
            return redirect(route('orders'))->with('success', 'Your order is complated! Thank you for shopping with us!');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
