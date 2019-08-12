
@extends('frontend.layouts.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Your wishlist</h1>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>    
            <li class="active">Your wishlist</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->

    @include('frontend.left_column.left_column')

    <?php $wishlist = Cart::instance('wishlist');?>

    <div class="col-sm-8 col-lg-9 mtb_20">
     @if($wishlist->count() > 0)
     <div class="cart-main">
        @include('frontend.carts.cart_table', ['carts' => $wishlist->content(), 'wishlist' => 'wishlist'])
        <div class="row">
            @include('frontend.carts.cart_total', ['subtotal' => $wishlist->subtotal, 'total' => $wishlist->total, 'tax' => $wishlist->tax])
        </div>
        <form action="index.html">
        <input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
        </form>
        <!-- <form action="checkout.html">
        <input class="btn pull-right mt_30" type="submit" value="Checkout" />
        </form> -->
      </div>
     @endif
        <div class="alert alert-warning text-center {{ $wishlist->count() > 0 ? 'hidden':'' }}" style="margin-bottom: 0;height: 300px;">
            <h1 style="margin-top: 95px;">OOPS!</h1>
            <p class="text-muted">Your wishlist is empty. Please go to <a class="btn" href="{{url('/')}}">shop to buy</a> </p>
        </div>
    </div>


    </div>
</div>
<!-- =====  CONTAINER END  ===== -->


@endsection