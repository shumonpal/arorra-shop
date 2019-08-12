
<div id="cart" class="btn-group btn-block mtb_40">
    <button type="button" class="btn cart" data-target=".cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="cart-total"> ({{$cartCounter = Cart::instance('cart')->content()->count()}})</span> </button>
</div>
@if($cartCounter > 0)
<div id="cart-dropdown" class="cart-menu collapse cart-dropdown">
<ul>
    @foreach(Cart::instance('cart')->content()->take(4) as $cart)
    <li>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td class="text-center"><a href="#"><img src="/{{product1stImage($cart->id)}}" alt="iPod Classic" title="iPod Classic"></a></td>
            <td class="text-left product-name"><a href="#">{{ $cart->name }}</a> <span class="text-left price">${{ $cart->price * $cart->qty }}</span>
            <input class="cart-qty" name="product_quantity" min="1" value="{{ $cart->qty }}" type="number" readonly>
            </td>
        </tr>
        </tbody>
    </table>
    </li>
    @endforeach
    <li>
    <table class="table">
        <tbody>
        <tr>
            <td class="text-right"><strong>Sub-Total</strong></td>
            <td class="text-right">${{Cart::instance('cart')->subtotal()}}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>VAT </strong></td>
            <td class="text-right">${{Cart::instance('cart')->tax()}}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>Total</strong></td>
            <td class="text-right">${{Cart::instance('cart')->total()}}</td>
        </tr>
        </tbody>
    </table>
    </li>
    <li>
    <form action="{{ route('cart') }}">
        <input class="btn pull-left mt_10" value="View cart" type="submit">
    </form>
    <form action="{{ route('checkout1') }}">
        <input class="btn pull-right mt_10" value="Checkout" type="submit">
    </form>
    </li>

</ul>
</div>
@endif