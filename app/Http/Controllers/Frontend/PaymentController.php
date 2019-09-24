<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use Srmklive\PayPal\Services\ExpressCheckout;
use Auth;
use Cart;
use Cartalyst\Stripe\Stripe;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
         // computed amount -> $amount;
        
         //$paystack = new Paystack();
         $user = Auth::user();
         $request->email = 'shumonbalok@gmail.com';
         $request->amount = 500;
        //  $request->reference = $paystack->genTranxRef();
        //  $request->key = config('paystack.secretKey');
 
         return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        dd( $paymentDetails = Paystack::getPaymentData() );
        return view('frontend.orders.orders', ['paymentDetails' => $paymentDetails]);

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function payWithPaypal()
    {
        $provider = new ExpressCheckout();
        $data = $this->getRequestData();
        //return $data;
        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);
    }

    public function payWithPaypalCallback(Request $request)
    {
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);


    }


    public function payWithStripe(Request $request)
    {
        
        $stripe = Stripe::make('sk_test_eMHwh8GwaNAdhCyY5vVN30PC00Jq8ecRVh');
        $charge = $stripe->charges()->create([
            //'customer' => 'cus_4EBumIjyaKooft',
            'amount'   => 50.49,
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'description' => 'order',
            'receipt_email' => 'email@gmail.com',
        ]);
        
        dd($charge);
        return $request->all();
    }

    protected function getRequestData()
    {
        $data = [];
        $data['items'] = [];
        foreach (Cart::instance('cart')->content() as $cart) {
            $itemsDetails = [
                'name' => $cart->name,
                'price' => $cart->price,
                'qty' => $cart->qty,
            ];
            $data['items'][] = $itemsDetails;
        }
        
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        $data['total'] = $total + Cart::instance('cart')->tax + session('shipping_method');

        //give a discount of 10% of the order amount
        $data['shipping_discount'] = 0.00;

        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payWithPaypalCallback');
        $data['cancel_url'] = route('checkout1');
        return $data;
    }
    
}