<div class="product-grid">
    <div class="item">
      <div class="product-thumb">
        <div class="image product-imageblock">
          <a href="{{url('productDetails/' . $product->id)}}">
            <img data-name="product_image" src="/{{ $product->images->first()->image }}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
            <img src="/{{ $product->images->count() > 1 ? $product->images->get(1)->image :  $product->images->first()->image}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
          </a>
          {!! Form::open([ 'method' => 'post']) !!}
          {!! Form::hidden('product_id', $product->id) !!} 
          <div class="button-group text-center">
            <div class="addToCart add-to-wishlist wishlist" data-action="{{ route('wishlist') }}"><a href="#"><span>wishlist</span></a></div>

            <?php $url = url('productDetails/' . $product->id); ?>

            <div class="quickview" onclick="showModalForm('{{ $product->name }}', '{{$url}}')"><a href="#"><span>Quick View</span></a></div>
            <div class="add-to-cart addToCart" data-action="{{ route('cart') }}"  ><a href="#"><span>Add to cart</span></a></div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="caption product-detail text-center">
          <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack">
            <i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
          <h6 data-name="product_name" class="product-name"><a href="#" title="{{ $product->name }}">{{ $product->name }}</a></h6>
          <span class="price"><span class="amount"><span class="currencySymbol">$</span>{{ $product->price }}</span>
          </span>
        </div>
      </div>
    </div>
  </div>