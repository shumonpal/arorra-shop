<div class="col-sm-12 mtb_20">
  <div class="row mt_10 ">
    <div class="col-md-5">
      <div><a class="thumbnails"> <img data-name="product_image"
            src="/{{ $product->images->first()->image ?? 'No image' }}" alt="" /></a></div>
      <div style="margin-top:40px;">
        <a class="btn btn-default" href="{{url('productDetails/' . $product->id)}}">More details</a>
      </div>
    </div>
    <div class="col-md-7 prodetail caption product-thumb">
      <h4 data-name="product_name" class="product-name"><a href="#"
          title="Casual Shirt With Ruffle Hem">{{ $product->name ?? 'No name' }}</a></h4>
      <div class="rating">
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
      </div>
      <span class="price mb_20"><span class="amount"><span class="currencySymbol">$</span>{{ $product->price }}</span>
      </span>
      <hr>
      <ul class="list-unstyled product_info mtb_20">
        <li>
          <label>Brand:</label>
          <span> <a href="#"> {{ $product->brands->name ?? 'No brand' }}</a></span></li>
        <li>
          <label>Product Code:</label>
          <span> #{{ $product->id }}</span></li>
        <li>
          <label>Availability:</label>
          <span> {{ $product->in_stock }}</span></li>
      </ul>
      <hr>
      {!! Form::open([ 'method' => 'post']) !!}
      {!! Form::hidden('product_id', $product->id) !!}
      <div id="product">
        <div class="form-group">
          <div class="row">
            <div class="Sort-by col-md-6">
              <label>Size</label>
              <select name="product_size" id="select-by-size" class="selectpicker form-control">
                @foreach($product->sizes as $size)
                <option value="{{ $size->id ?? 0 }}">{{ $size->size ?? 'One size'}}</option>
                @endforeach
              </select>
            </div>
            <div class="Color col-md-6">
              <label>Qty</label>
              <input name="product_quantity" min="1" value="1" type="number">

            </div>
          </div>
        </div>
        <div class="qty mt_30 form-group2">
          <label>Color</label>
          <ul>
            @foreach($product->colors as $color)
            <li class="m-r-10">
              <label class="color-filter" for="color-filter"
                style="background-color: {{ $color->color ?? 'One color' }};"></label>
              <input class="checkbox-color-filter products-filter" type="radio" name="color"
                value="{{$color->color ?? 'One color'}}">

            </li>
            @endforeach
          </ul>
        </div>
        <div class="button-group mt_30">
          <div class="addToCart add-to-cart" data-action="{{ route('cart') }}"><a href="#"><span>Add to cart</span></a>
          </div>
          <div class="addToCart add-to-wishlist wishlist" data-action="{{ route('wishlist') }}"><a
              href="#"><span>wishlist</span></a></div>
        </div>
      </div>
      {!! Form::close() !!}

    </div>
  </div>


</div>