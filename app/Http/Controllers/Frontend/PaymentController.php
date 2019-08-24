<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use Auth;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
         // computed amount -> $amount;
        
         $paystack = new Paystack();
         $user = Auth::user();
         $request->email = 'shumonbalok@gmail.com';
         $request->amount = 500;
         $request->reference = $paystack->genTranxRef();
         $request->key = config('paystack.secretKey');
 
         return $paystack->getAuthorizationUrl()->redirectNow();
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
}