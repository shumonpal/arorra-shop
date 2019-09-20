<form method="POST" action="{{route('payWithPaypal')}}" accept-charset="UTF-8" class="form-horizontal" role="form">
         <!-- <input type="hidden" name="cmd" value="_cart"> -->
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="shumonpal1-facilitator@gmail.com">
        <input name="currency_code" type="hidden" value="USD">
        <input type="hidden" name="item_name" value="hat">
        <input type="hidden" name="item_number" value="123">
        <input type="hidden" name="amount" value="15.00"><!-- 
        <input type="hidden" name="first_name" value="John">
        <input type="hidden" name="last_name" value="Doe">
        <input type="hidden" name="address1" value="9 Elm Street">
        <input type="hidden" name="address2" value="Apt 5">
        <input type="hidden" name="city" value="Berwyn">
        <input type="hidden" name="state" value="PA"> 
        <input type="hidden" name="zip" value="19312">-->
        <input type="hidden" name="night_phone_a" value="610">
        <input type="hidden" name="night_phone_b" value="555">
        <input type="hidden" name="night_phone_c" value="1234">
        <input type="hidden" name="email" value="shumonpal1@gmail.com">
        <input type="hidden" name="return" value="http://127.0.0.1:8000/payWithPaypal">
        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
        <input data-toggle="tooltip" 
              @if(session('payment_method') && session('shipping_method') && session('shipping_address'))
              type="submit"
              @else
              type="button" title="Please complate above steps" 
              @endif 
              class="btn" id="button-confirm" value="Confirm Order">

</form>