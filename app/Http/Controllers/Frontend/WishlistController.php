<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
class WishlistController extends Controller
{
	public function totalPrice()
	{
		$total = array();
			$total['subtotal'] = Cart::instance('wishlist')->subtotal();
			$total['total'] = Cart::instance('wishlist')->total();
			$total['tax'] = Cart::instance('wishlist')->tax();

			return $total;
	}

	public function index(Request $request)
	{
		if ($request->qty) {
			Cart::instance('wishlist')->update($request->rowId, $request->qty);

			return $this->totalPrice();

		}
		return view('frontend.carts.wishlist');
	}



    public function getWishlist(Request $request)
    {
		if(!$request->ajax()){
			return view('frontend.carts.wishlist');
		}

    	$product = Product::findOrFail($request->product_id);    
    	if ($request->color && $request->size) {
			Cart::instance('wishlist')->add($product->id, $product->name, $request->product_quantity, $product->price, ['color' => $request->color, 'size' => $request->product_size]);    		
    	}else{
    		Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->price);
    	}
    	return view('frontend.carts.mini_wishlist');
    }

    public function deleteCart($id)
    {
    	Cart::instance('wishlist')->remove($id);
    	return $this->totalPrice();
    }

    public function addCart($id)
    {
    	$list = Cart::instance('wishlist')->get($id);
    	Cart::instance('cart')->add($list->id, $list->name, $list->qty, $list->price, ['color' => 'no-select']);
    	Cart::instance('wishlist')->remove($id);
    	return $this->totalPrice();
    }
}
