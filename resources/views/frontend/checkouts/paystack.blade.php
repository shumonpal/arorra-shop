<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <!-- <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2"> -->
            <input type="hidden" name="email" value="shumonbalok@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{Auth::user()->id .'-'. date('dmy')}}">
            <input type="hidden" name="amount" value="{{str_replace(',', '', $carts->total()) + session('shipping_method')}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <!-- <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}} -->
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
            <input data-toggle="tooltip" 
                  @if(session('payment_method') && session('shipping_method') && session('shipping_address'))
                  type="submit"
                  @else
                  type="button" title="Please complate above steps" 
                  @endif 
                  class="btn" id="button-confirm" value="Confirm Order">
          <!-- </div>
        </div> -->
</form>