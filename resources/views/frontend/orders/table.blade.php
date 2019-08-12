<form enctype="multipart/form-data" method="post" action="#">
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Model</td>
                <td class="text-left">Quantity</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)        
        <tr class="cart-div">
            <td class="text-center"><a href="{{url('productDetails/' . $cart->id)}}"><img src="/{{product1stImage($cart->id)}}" alt="{{$cart->name}}" title="{{$cart->name}}" style="max-height: 100px;" class="img-responsive"></a></td>
            <td class="text-left"><a href="{{url('productDetails/' . $cart->id)}}">{{$cart->name}}</a></td>
            <td class="text-left">{{productModel($cart->id)}}</td>
            <td class="text-left">
                <div style="max-width: 200px;" class="input-group btn-block">
                    <input type="text" class="form-control quantity" size="1" value="{{$cart->qty}}" name="quantity">
                    <span class="input-group-btn">
                    <button class="btn  product-qty-update" title="Update" data-toggle="tooltip" type="submit"
                    data-url="{{ isset($wishlist) ? route('wishlist') : route('cart')}}" data-id="{{ $cart->rowId }}"><i class="fa fa-refresh"></i></button>
                    <button  class="btn btn-danger cart-delete {{ isset($wishlist) ? 'wishlist' : '' }}" title="Delete" data-toggle="tooltip" type="button" data-url="{{ isset($wishlist) ? route('wishlist-delete', $cart->rowId) : route('cart-delete', $cart->rowId) }}"><i class="fa fa-times-circle"></i></button>
                    </span>
                </div>
            </td>
            <td class="text-right price">${{$cart->price}}</td>
            <td class="text-right pdt-total">${{$cart->subtotal}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</form>