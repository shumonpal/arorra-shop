
 @extends('frontend.layouts.layout')

@section('content')
   <!-- =====  CONTAINER START  ===== -->
   <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>{{ title_case($product->name) }}</h1>
            <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="category_page.html">Products</a></li>
              <li class="active">{{ title_case($product->name) }}</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <div class="heading-part">
                <h2 class="main_title">Top category</h2>
              </div>
              <ul class="nav  main-navigation collapse in">
                <li><a href="#">Appliances</a></li>
                <li><a href="#">Mobile Phones</a></li>
                <li><a href="#">Tablet PC & Accessories</a></li>
                <li><a href="#">Consumer Electronics</a></li>
                <li><a href="#">Computers & Networking</a></li>
                <li><a href="#">Electrical & Tools</a></li>
                <li><a href="#">Apparel</a></li>
                <li><a href="#">Bags & Shoes</a></li>
                <li><a href="#">Toys & Hobbies</a></li>
                <li><a href="#">Watches & Jewelry</a></li>
                <li><a href="#">Home & Garden</a></li>
                <li><a href="#">Health & Beauty</a></li>
                <li><a href="#">Outdoors & Sports</a></li>
              </ul>
            </div>
          </div>
          <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
          <div class="left-special left-sidebar-widget mb_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Top Products</h2>
            </div>
            <div id="left-special" class="owl-carousel">
              <ul class="row ">
                <li class="item product-layout-left mb_20">
                  <div class="product-list col-xs-4">
                    <div class="product-thumb">
                      <div class="image product-imageblock"> <a href="product_detail_page.html"> 
                        <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}">
                        <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}"> </a> </div>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="caption product-detail">
                      <h6 class="product-name"><a href="#">{{ title_case($product->name) }}</a></h6>
                      <div class="rating">
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">$</span>{{ $product->price }}</span>
                      </span>
                    </div>
                  </div>
                </li>
                <li class="item product-layout-left mb_20">
                  <div class="product-list col-xs-4">
                    <div class="product-thumb">
                      <div class="image product-imageblock"> <a href="product_detail_page.html"> 
                        <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}">
                        <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}"> </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="caption product-detail">
                      <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                      <div class="rating">
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                    </div>
                  </div>
                </li>
                <li class="item product-layout-left mb_20">
                  <div class="product-list col-xs-4">
                    <div class="product-thumb">
                      <div class="image product-imageblock"> <a href="product_detail_page.html"> 
                       <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}">
                       <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="/{{$product->images->first()->image}}">
                        </a> </div>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="caption product-detail">
                      <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                      <div class="rating">
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                    </div>
                  </div>
                </li>
              </ul>
             
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="row mt_10 ">
            <div class="col-md-6">
              <div><a class="thumbnails"> <img data-name="product_image" src="/{{$product->images->first()->image}}" alt="" /></a></div>
              <div id="product-thumbnail" class="owl-carousel">
              @foreach($product->images as $image)
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="/{{ $image->image }}" data-fancybox="group1"> <img src="/{{ $image->image }}" alt="" /></a></div>
                </div>
              @endforeach  
              </div>
            </div>
            <div class="col-md-6 prodetail caption product-thumb">
              <h4 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h4>
              <div class="rating">
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
              </div>
              <span class="price mb_20"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
              </span>
              <hr>
              <ul class="list-unstyled product_info mtb_20">
                <li>
                  <label>Brand:</label>
                  <span> <a href="#">{{ $product->brands->name }}</a></span></li>
                <li>
                  <label>Product Code:</label>
                  <span> #{{ $product->id }}</span></li>
                <li>
                  <label>Availability:</label>
                  <span> {{ $product->in_stock }}</span></li>
              </ul>
              <hr>
              <p class="product-desc mtb_30"> {{ $product->descp }}</p>
              {!! Form::open(['route' => 'cart', 'method' => 'post']) !!}
					    {!! Form::hidden('product_id', $product->id) !!}
              <div id="product">
                <div class="form-group">
                  <div class="row">
                    <div class="Sort-by col-md-6">
                      <label>Size: </label>
                      <select name="product_size" id="select-by-size" class="selectpicker form-control">
                        @foreach($product->sizes as $size)
                          <option value="{{ $size->id }}">{{ $size->size }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="Color col-md-6">
                      <label>Qty: </label>
                      <input name="product_quantity" min="1" value="1" type="number">
                    </div>
                  </div>
                </div>
                <div class="qty mt_30 form-group2">
                  <label>color: </label>
                  <ul>
                  @foreach($product->colors as $color)
                  <li class="m-r-10">
                    <label class="color-filter" for="color-filter" style="background-color: {{ $color->color }};"></label>
                    <input class="checkbox-color-filter products-filter" type="radio" name="color" value="{{$color->color}}">
                  </li>
                  @endforeach
                  </ul>
                </div>
                <div class="button-group mt_30">
                  <div class="addToCart add-to-cart" data-action="{{ route('cart') }}"><a href="#"><span>Add to cart</span></a></div>
                  <div class="addToCart add-to-wishlist wishlist" data-action="{{ route('wishlist') }}"><a href="#"><span>wishlist</span></a></div>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
          </div>

          @include('frontend.product_details_page.related_products')

        </div>
      </div>
    </div>
   <!-- =====  CONTAINER END  ===== -->
   
   @include('frontend.modals.product_details')

  @endsection