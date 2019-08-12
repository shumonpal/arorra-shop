
@extends('frontend.layouts.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Shopping Cart</h1>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>    
            <li class="active">Shopping Cart</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->

    @include('frontend.left_column.left_column')

    <?php $cart = Cart::instance('cart');?>

    <div class="col-sm-8 col-lg-9 mtb_20">
    
        @if($paymentDetails['status'])
        <div class="cart-main">
            @include('frontend.orders.table', ['carts' => $cart->content()])


            <div class="row">
                @include('frontend.carts.total', ['subtotal' => $cart->subtotal, 'total' => $cart->total, 'tax' => $cart->tax,])
            </div>
            <form action="{{ url('/') }}">
            <input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
            </form>
            <form action="{{ route('checkout1') }}">
            <input class="btn pull-right mt_30" type="submit" value="Checkout" />
            </form>
        </div>
        @endif
        <div class="alert alert-warning text-center {{ $cart->count() > 0 ? 'hidden':'' }}" style="margin-bottom: 0;height: 300px;">
            <h1 style="margin-top: 95px;">OOPS!</h1>
            <p class="text-muted">Your shopping cart is empty. Please go to <a class="btn" href="{{url('/')}}">shop to buy</a> </p>
        </div>
    </div>


    </div>
</div>
<!-- =====  CONTAINER END  ===== -->


@endsection