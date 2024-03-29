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
use App\Models\Order;
use DB;


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
        $request->reference = Paystack::genTranxRef();
        $request->key = config('paystack.secretKey');

        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        dd(Auth::user());
        $order = Order::create([
            'payer_id' => $paymentDetails['data']['id'],
            'user_id' => $paymentDetails['data']['metadata']['user_id'],
            'invoice_id' => $paymentDetails['data']['reference'],
            'invoice_description' => 'None',
            'payer_email' => Auth::user()->email,
            'status' => $paymentDetails['data']['status'] == 'success' ? 1 : 0,
            'pay_method' => session('payment_method'),
            'shipping_method' => session('shipping_method'),
            'total' => Cart::instance('cart')->total,
        ]);
        $carts = Cart::instance('cart')->content();
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

        Cart::instance('cart')->destroy();
        request()->session()->forget(['shipping_address', 'shipping_method', 'payment_method']);

        return redirect(route('user_order'))->with('success', 'Order Success! Thank you for shopping with us.');

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function payWithPaypal()
    {
        $provider = new ExpressCheckout();
        //$data = $this->getRequestData(request(), $payment_type = 'paypal');
        //return $data;
        $data = [];
        $data['items'] = [];
        foreach (Cart::instance('cart')->content() as $cart) {
            $itemsDetails = [
                'name' => $cart->name,
                'price' =>  $cart->price,
                'qty' =>  $cart->qty,
            ];
            $data['items'][] = $itemsDetails;
        }
        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        //$total = $total + Cart::instance('cart')->tax + session('shipping_method');

        //give a discount of 10% of the order amount

        $data['shipping_discount'] = 0.00;
        $data['total'] = $total;
        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payWithPaypalCallback');
        $data['cancel_url'] = route('checkout1');

        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);
    }

    public function payWithPaypalCallback(Request $request)
    {

        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);
        //dd($response['INVNUM']);
        $order = Order::create([
            'payer_id' => $response['PAYERID'],
            'user_id' => auth()->user()->id,
            'invoice_id' => $response['INVNUM'],
            'invoice_description' => $response['DESC'],
            'payer_email' => auth()->user()->email,
            'status' => $response['ACK'] == 'success' ? 0 : 1,
            'pay_method' => session('payment_method'),
            'shipping_method' => session('shipping_method'),
            'total' => $response['AMT'],
        ]);
        $carts = Cart::instance('cart')->content();
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

        Cart::instance('cart')->destroy();
        request()->session()->forget(['shipping_address', 'shipping_method', 'payment_method']);

        return redirect(route('user_order'))->with('success', 'Order Success! Thank you for shopping with us.');
    }


    public function payWithStripe(Request $request)
    {
        try {
            $carts = Cart::instance('cart')->content();
            $name = $carts->implode('name', ', ');
            $price = $carts->implode('price', ', ');
            $qty = $carts->implode('qty', ', ');

            $stripe = Stripe::make('sk_test_eMHwh8GwaNAdhCyY5vVN30PC00Jq8ecRVh');

            $charge = $stripe->charges()->create(
                [
                    'amount'   => Cart::instance('cart')->total,
                    'currency' => 'USD',
                    'source' => $request->stripeToken,
                    'description' => 'order',
                    'receipt_email' => auth()->user()->email,
                    'metadata' => [
                        'products' => $name,
                        'price' => $price,
                        'qty' => $qty,
                    ]

                ]
            );

            $order = Order::create([
                'payer_id' => $charge['id'],
                'user_id' => auth()->user()->id,
                'invoice_id' => $charge['invoice'],
                'invoice_description' => $charge['receipt_url'],
                'payer_email' => $charge['receipt_email'],
                'status' => $charge['status'] == 'succeeded' ? 1 : 0,
                'pay_method' => session('payment_method'),
                'shipping_method' => session('shipping_method'),
                'total' => Cart::instance('cart')->total,
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

            Cart::instance('cart')->destroy();
            $request->session()->forget(['shipping_address', 'shipping_method', 'payment_method']);

            return redirect(route('user_order'))->with('success', 'Order Success! Thank you for shopping us.');
        } catch (Exception $e) {
            throw back()->with('danger', $e->getMessage());
        }
    }

    protected function getRequestData($request, $payment_type)
    {

        $data = [];
        $data['metadata'] = [];
        foreach (Cart::instance('cart')->content() as $cart) {
            $itemsDetails = [
                'name' => $cart->name,
                'price' =>  $cart->price,
                'qty' =>  $cart->qty,
            ];
            $data['metadata'][] = $itemsDetails;
        }
        $total = 0;
        foreach ($data['metadata'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $total = $total + Cart::instance('cart')->tax + session('shipping_method');

        //give a discount of 10% of the order amount

        if ($payment_type == 'paypal') {
            $data['shipping_discount'] = 0.00;
            $data['total'] = $total;
            $data['invoice_id'] = uniqid();
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payWithPaypalCallback');
            $data['cancel_url'] = route('checkout1');
        }

        return $data;
    }
}
