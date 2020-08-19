<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;



class CheckoutController extends Controller
{


	public function checkout1()
	{
		return view('frontend.checkouts.checkout');
	}


	public function checkout2(Request $request)
	{
		if ($request->method() == 'POST') {
			if ($request->checkoutBy) {
				session(['checkoutBy' => $request->payment]);
				return redirect(url('/register'))->with('checkoutBy_temp', 'checkoutBy_temp');
			} elseif ($request->shipping_address) {

				if ($request->shipping_address == 'new') {
					User::where('id', Auth::user()->id)
						->update([
							'name' => $request->name,
							'phone' => $request->phone,
							'country' => $request->country,
							'state' => $request->state,
							'address' => $request->address
						]);
				}
				session(['shipping_address' => $request->shipping_address]);
				return back()->with('shipping_address_temp', 'shipping_address_temp');
			} elseif ($request->shipping_method) {
				session(['shipping_method' => $request->shipping_method]);
				session(['shipping_method_cmnt' => $request->comment]);
				return back()->with('shipping_method_temp', 'shipping_method_temp');
			} elseif ($request->payment_method) {
				session(['payment_method' => $request->payment_method]);
				return back()->with('payment_method_temp', 'payment_method_temp');
			}
		}
	}
}
