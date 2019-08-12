<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
class CartController extends Controller
{
	public function totalPrice()
	{
		$total = array();
			$total['subtotal'] = Cart::instance('cart')->subtotal();
			$total['total'] = Cart::instance('cart')->total();
			$total['tax'] = Cart::instance('cart')->tax();

			return $total;
	}

	public function index(Request $request)
	{
		if ($request->qty) {
			$cart = Cart::instance('cart')->update($request->rowId, $request->qty);

			return $this->totalPrice();

		}
		return view('frontend.carts.cart');
	}
	

    public function getCart(Request $request)
    {
    	$product = Product::findOrFail($request->product_id);    
    	if ($request->color && $request->size) {
			Cart::instance('cart')->add($product->id, $product->name, $request->product_quantity, $product->price, ['color' => $request->color, 'size' => $request->product_size]);    		
    	}else{
    		Cart::instance('cart')->add($product->id, $product->name, 1, $product->price);
    	}
    	return view('frontend.carts.mini_cart');
    }

    public function deleteCart($id)
    {
    	Cart::instance('cart')->remove($id);
    	return $this->totalPrice();
    }


}
