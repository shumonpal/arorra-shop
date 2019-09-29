
@extends('frontend.layouts.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Your Orders</h1>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>    
            <li class="active">Your Orders</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->

    <div id="column-left" class="col-sm-3 col-lg-2 hidden-xs">
        <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
            <ul class="nav  main-navigation collapse in">
                <li class="active"><a href="#">Profile</a></li>
                <li><a href="{{route('cart')}}">Carts</a></li>
                <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                <li><a href="{{route('user_order')}}">Orders</a></li>
            </ul>
            </div>
        </div>
        
    </div>


    <div class="col-sm-9 col-lg-10 mtb_20">
    
        <div class="cart-main">
            <form enctype="multipart/form-data" method="post" action="#">
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Ref. No.</td>
                            <td class="text-center">Products name | Qty | Size | Color</td>
                            <td class="text-center">Total</td>
                            <td class="text-center">Invoice</td>
                            <td class="text-center">Status</td>
                        </tr>
                    </thead>
                    <tbody>      
                    @foreach($orders as $order) 
                    <tr class="cart-div">
                        <td class="text-center">#{{$order->created_at->format('ymd') . '_' . $order->id}}</td>
                        <td class="text-center">
                            @foreach($order->products as $product)
                                <p><a href="{{url('productDetails/' . $product->product_id)}}">{{$product->product->name}}</a> | {{$product->qty}} | {{$product->size}} | {{$product->color}}</p>
                            @endforeach
                        </td>
                        <td class="text-center price">${{ $order->total}}</td>
                        <td class="text-center pdt-total"><a class="btn btn-default" href="{{ $order->invoice_description}}" target="blank" title="Click here to see invoice">Invoice</a></td>
                        <td class="text-center">{{ $order->status }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </form>

            <form action="{{ url('/') }}">
            <input class="btn pull-right mt_30" type="submit" value="Shopping" />
            </form>
        </div>
        <div class="alert alert-warning text-center {{ 5 > 0 ? 'hidden':'' }}" style="margin-bottom: 0;height: 300px;">
            <h1 style="margin-top: 95px;">OOPS!</h1>
            <p class="text-muted">Your shopping cart is empty. Please go to <a class="btn" href="{{url('/')}}">shop to buy</a> </p>
        </div>
    </div>


    </div>
</div>
<!-- =====  CONTAINER END  ===== -->


@endsection