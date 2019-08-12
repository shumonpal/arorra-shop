
<div id="cart" class="btn-group btn-block mtb_40">
    <button type="button" class="btn wishlist" data-target=".wishlist-dropdown" data-toggle="collapse" aria-expanded="true"><span id="wishlist-total"> ({{$cartCounter = Cart::instance('wishlist')->content()->count()}})</span> </button>
</div>
@if($cartCounter > 0)
<div id="cart-dropdown" class="cart-menu collapse wishlist-dropdown">
<ul>
    @foreach(Cart::instance('wishlist')->content()->take(4) as $cart)
    <li>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td class="text-center"><a href="#"><img src="/{{product1stImage($cart->id)}}" alt="iPod Classic" title="iPod Classic"></a></td>
            <td class="text-left product-name"><a href="#">{{ $cart->name }}</a> <span class="text-left price">${{ $cart->price * $cart->qty }}</span>
            <input class="cart-qty" name="product_quantity" min="1" value="{{ $cart->qty }}" type="number" readonly>
            </td>
            <td class="text-center"></td>
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
            <td class="text-right">${{Cart::instance('wishlist')->subtotal()}}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>VAT </strong></td>
            <td class="text-right">${{Cart::instance('wishlist')->tax()}}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>Total</strong></td>
            <td class="text-right">${{Cart::instance('wishlist')->total()}}</td>
        </tr>
        </tbody>
    </table>
    </li>
    <li>
    <form action="{{ route('wishlist') }}">
        <input class="btn pull-left mt_10" value="View Wishlist" type="submit">
    </form>
    
    </li>

</ul>
</div>
@endif