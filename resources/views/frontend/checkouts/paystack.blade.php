
        <!-- <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2"> -->
            <input type="hidden" name="email" value="shumonbalok@gmail.com"> {{-- required --}}
{{-- For other necessary things you want to add to your payload. it is optional though --}}
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
