
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

    
    <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default  ">
                <div class="panel-heading">
                <h4 class="panel-title {{ Auth::check() ? 'color-green' : ''}}">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1: Checkout Options <i class="fa fa-caret-down"></i>
                    @if(Auth::check())<i class="fa fa-check pull-right"></i>@endif
                    </a>
                </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse {{ ! session('shipping_address_temp') && ! session('checkoutBy_temp') && ! session('shipping_method_temp') && ! session('payment_method') ? 'in' : '' }}">
                <div class="panel-body">
                    <div class="row">
                        @if(Auth::check())
                        <div class="col-sm-12 text-center">
                            <i class="fa fa-check-circle fa-5x color-green"></i>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <form action="{{ route('checkout2') }}" method="post">
                                {!! csrf_field() !!}
                                <h3>New Customer</h3>
                                <p>Checkout Options:</p>
                                <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="register" name="checkoutBy"> Register Account</label>
                                </div>
                                
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                <input type="submit" class="btn mt_20" data-loading-text="Loading..." id="button-account" value="Continue">
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h3>Returning Customer</h3>
                            <p>I am a returning customer</p>
                            <form method="post" action="{{ url('/login') }}">
                                {!! csrf_field() !!}
                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="submit" class="btn" data-loading-text="Loading..." id="button-login" value="Login">
                            </form>
                            <a class="pt_30" href="#">Forgotten Password</a></div>
                        </div>
                        @endif
                    </div>
                </div>
                </div>
            </div>

            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h4 class="panel-title {{ session('shipping_address') && Auth::check() ? 'color-green' : ''}}"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Step 2: Delivery Details <i class="fa fa-caret-down"></i>
                    @if(session('shipping_address') && Auth::check())<i class="fa fa-check pull-right"></i>@endif
                    </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse {{ session('checkoutBy_temp') ? 'in' : '' }}">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('checkout2') }}">
                    {!! csrf_field() !!}

                    <div class="radio">
                        <label>
                        <input type="radio" {{ session('shipping_address') == 'existing' ? 'checked="checked"' : ''}}  value="existing" name="shipping_address"> I want to use an existing address</label>
                    </div>
                    <div id="shipping-existing">
                        <select class="form-control" name="shipping_address">
                        <option selected="selected" value="existing">{{ Auth::check() ? Auth::user()->address : '' }}</option>
                        </select>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" {{ session('shipping_address') == 'new' ? 'checked="checked"' : ''}} value="new" name="shipping_address"> I want to use a new address</label>
                    </div>
                    <br>
                    <div id="shipping-new" style="display: none;">
                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }} required">
                            <label for="input-shipping-firstname" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-firstname" placeholder="Name" value="{{ old('name') }}" name="name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }} required">
                            <label for="input-shipping-firstname" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-firstname" placeholder="Phone" value="{{ old('phone') }}" name="phone">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('country') ? ' has-error' : '' }} required">
                            <label for="input-shipping-country" class="col-sm-2 control-label">country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-country" placeholder="First country" value="{{ old('country') }}" name="country">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('state') ? ' has-error' : '' }} required">
                            <label for="input-shipping-state" class="col-sm-2 control-label">state</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-state" placeholder="State" value="{{ old('state') }}" name="state">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }} required">
                            <label for="input-shipping-address" class="col-sm-2 control-label">address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-address" placeholder="First address" value="{{ old('address') }}" name="address">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                        <input  data-toggle="tooltip" 
                        @if(session('shipping_address') || Auth::check())
                         type="submit"
                        @else
                        type="button" title="Please complate 1st step"
                        @endif
                        class="btn" id="button-shipping-address" value="Continue">
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">
                <h4 class="panel-title {{ session('shipping_method') && Auth::check() ? 'color-green' : ''}}"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Step 3: Shipping Method <i class="fa fa-caret-down"></i>
                @if(session('shipping_method') && Auth::check())<i class="fa fa-check pull-right"></i>@endif
                </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse {{ session('shipping_address_temp') ? 'in' : '' }}">
                <div class="panel-body">
                    <form action="{{ route('checkout2') }}" method="post">
                    {!! csrf_field() !!}
                        <p>Please select the preferred shipping method to use on this order.</p>
                        <p><strong>Flat Rate</strong></p>
                        <div class="radio">
                        <label>
                            <input type="radio" checked="{{session('shipping_method') == 1 ? 'checked' : ''}}" value="1" name="shipping_method"> Free Shipping Rate(within 20 dayes) - $0.00</label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" checked="{{session('shipping_method') == 3 ? 'checked' : ''}}" value="3" name="shipping_method"> Flat Shipping Rate(within 10 dayes) - $3.00</label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" checked="{{session('shipping_method') == 7 ? 'checked' : ''}}" value="7" name="shipping_method"> Flat Shipping Rate(within 5 dayes) - $7.00</label>
                        </div>
                        <p><strong>Add Comments About Your Order</strong></p>
                        <p>
                        <textarea class="form-control" rows="8" name="comment"></textarea>
                        </p>
                        <div class="buttons clearfix">
                        <div class="pull-right">
                        <input  data-toggle="tooltip" 
                        @if(session('shipping_address') && Auth::check())
                         type="submit"
                        @else
                        type="button" title="Please complate 1st step"
                        @endif
                        class="btn" id="button-shipping-address" value="Continue">
                        </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">
                <h4 class="panel-title {{ session('payment_method') && Auth::check() ? 'color-green' : ''}}"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Step 4: Payment Method <i class="fa fa-caret-down"></i>@if(session('payment_method') && Auth::check())<i class="fa fa-check pull-right"></i>@endif</a> </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse {{ session('shipping_method_temp') ? 'in' : '' }}">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('checkout2') }}">
                        {!! csrf_field() !!}
                        <p>Please select the preferred payment method to use on this order.</p>
                        <div class="radio">
                        <label>
                            <input type="radio" value="cash" name="payment_method" {{ session('payment_method') == 'cash' ? 'checked="checked"' : ''}}> Cash On Delivery </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" value="paypal" name="payment_method" {{ session('payment_method') == 'paypal' ? 'checked="checked"' : ''}}> PayPal</label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" value="paystack" name="payment_method" {{ session('payment_method') == 'paystack' ? 'checked="checked"' : ''}}> Paystack</label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" value="stripe" name="payment_method" {{ session('payment_method') == 'stripe' ? 'checked="checked"' : ''}}> Stripe</label>
                        </div>
                        <div class="buttons">
                        <div class="pull-right mt_20">I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a>
                            <input type="checkbox" value="1" name="agree"> &nbsp;
                            <input data-toggle="tooltip" 
                                @if(session('shipping_method') && session('shipping_address') && Auth::check())
                                type="submit"
                                @else
                                type="button" title="Please complate above steps"
                                @endif
                                class="btn" id="button-payment-method" value="Continue">
                        </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Step 5: Confirm Order<i class="fa fa-caret-down"></i></a> </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse {{ session('payment_method_temp') ? 'in' : '' }}">
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $carts = Cart::instance('cart'); ?>
                        @foreach($carts->content() as $cart) 
                        <tr>
                            <td class="text-left"><a href="{{url('productDetails/' . $cart->id)}}">{{ $cart->name }}</a></td>
                            <td class="text-left">{{productModel($cart->id)}}</td>
                            <td class="text-right">{{$cart->qty}}</td>
                            <td class="text-right">${{$cart->price}}</td>
                            <td class="text-right">${{$cart->subtotal}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                            <td class="text-right">${{$carts->subtotal}}</td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="4"><strong>Tax:</strong></td>
                            <td class="text-right">${{$carts->tax}}</td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                            <td class="text-right">${{session('shipping_method')}}.00</td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="4"><strong>Total:</strong></td>
                            <td class="text-right">${{str_replace(',', '', $carts->total()) + session('shipping_method')}}</td>
                        </tr>
                        </tfoot>
                    </table>

                    @if(session('payment_method') == 'stripe')
                        @include('frontend.checkouts.stripe', ['carts' => $carts])
                    @endif
                    </div>

                    @if(session('payment_method') == 'paypal' || session('payment_method') == 'paystack')
                    <div class="buttons">
                        <a href="{{route('cart')}}" class="btn" id="button-confirm">Review Order</a>
                        <div class="pull-right">

                        @auth
                        @if(session('payment_method') == 'paystack')
                            @include('frontend.checkouts.paystack', ['carts' => $carts])
                        @elseif(session('payment_method') == 'paypal')
                            @include('frontend.checkouts.paypal', ['carts' => $carts])
                        @endif
                        @endauth    
                        </div>
                    </div>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
<!-- =====  CONTAINER END  ===== -->


@endsection

@section('scripts')
<script type="text/javascript">
  $('input[name=\'payment_address\']').on('change', function() {
    if (this.value == 'new') {
      $('#payment-existing').hide();
      $('#payment-new').show();
    } else {
      $('#payment-existing').show();
      $('#payment-new').hide();
    }
  });
  $('input[name=\'shipping_address\']').on('change', function() {
    if (this.value == 'new') {
      $('#shipping-existing').hide();
      $('#shipping-new').show();
    } else {
      $('#shipping-existing').show();
      $('#shipping-new').hide();
    }
  });
  </script>
  @endsection