<?php
  $new_products = $products->sortByDesc('id')->take(20);

  $feature_products = $products->where('is_featured', 1)->sortByDesc('id')->take(20);
  $feature_products_id = $feature_products->pluck('id');

?>

<div class="row ">
  <div class="col-sm-12 mt_30">
    <div id="product-tab" class="mt_10">
      <div class="heading-part mb_10 ">
        <h2 class="main_title">Featured Products</h2>
      </div>
      <ul class="nav text-right">
        <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
        <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
        <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
      </ul>
      <div class="tab-content clearfix box">
        <div class="tab-pane active" id="nArrivals">
          <div class="nArrivals owl-carousel">
          @if($new_products)
          @foreach($new_products->whereNotIn('id', $feature_products_id) as $product)
            @include('frontend.home_page.product')
          @endforeach
          @endif
          </div>
        </div>

        <div class="tab-pane" id="Bestsellers">
          <div class="Bestsellers owl-carousel">
            <div class="product-grid">
              <div class="item">
                <div class="product-thumb  mb_30">
                  <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="/frontend/images/product/product1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="/frontend/images/product/product1-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                    <div class="button-group text-center">
                      <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                      <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                      <div class="compare"><a href="#"><span>Compare</span></a></div>
                      <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                  </div>
                  <div class="caption product-detail text-center">
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="Featured">
          <div class="Featured owl-carousel">
          @if($feature_products)
          @foreach($feature_products as $product)
            @include('frontend.home_page.product')
          @endforeach
          @endif
          </div>
        </div>

      </div>
    </div>
  </div>
</div>