
@extends('frontend.layouts.layout')
@section('styles')
   <!--Plugin CSS file with desired skin-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>
@endsection
@section('content')
   <!-- =====  CONTAINER START  ===== -->
   <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Shop</h1>
            <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Shop By:</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 ">
          <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <div class="heading-part">
                <h2 class="main_title">Top category</h2>
              </div>
              <ul class="nav  main-navigation collapse in">
                @foreach($categories as $category)
                <li class="{{Request::query('categories_id') == $category->id ? 'active' : ''}}"><a href="{{ route('shop', ['category_id' => $category->id]) }}">{{ title_case($category->name) }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="filter left-sidebar-widget mb_50">
            <div class="heading-part mtb_20 ">
              <h2 class="main_title">Refinr Search</h2>
            </div>
            <div class="filter-block">
              <p>
                <label for="amount">Price range:</label>
                <input type="text" class="js-range-slider" name="my_range" value="" />
                <!-- <input type="text" id="amount" readonly> -->
              </p>
              <div id="slider-range" class="mtb_20"></div>
              <div class="list-group">
                <div class="list-group-item mb_10">
                  <label>Color</label>
                  <div id="filter-group1">
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Red (10)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Green (06)</label>
                    </div>
                    <div class="checkbox ">
                      <label>
                        <input value="" type="checkbox"> Blue(09)
                      </label>
                    </div>
                  </div>
                </div>
                <div class="list-group-item mb_10">
                  <label>Size</label>
                  <div id="filter-group3">
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Big (3)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Medium (2)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Small (1)</label>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn">Refine Search</button>
              </div>
            </div>
          </div>

        </div>



        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="category-page-wrapper mb_30">
            <div class="list-grid-wrapper pull-left">
              <div class="btn-group btn-list-grid">
                <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                <button type="button" id="list-view" class="btn btn-default list-view"></button>
              </div>
            </div>
            <div class="page-wrapper pull-right">
              <label class="control-label" for="input-limit">Show :</label>
              <div class="limit">
                <select id="input-limit" class="form-control">
                  <option value="8" selected="selected">08</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                </select>
              </div>
              <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </div>
            <div class="sort-wrapper pull-right">
              <label class="control-label" for="input-sort">Sort By :</label>
              <div class="sort-inner">
                <select id="input-sort" class="form-control">
                  <option value="ASC" selected="selected">Default</option>
                  <option value="ASC">Name (A - Z)</option>
                  <option value="DESC">Name (Z - A)</option>
                  <option value="ASC">Price (Low &gt; High)</option>
                  <option value="DESC">Price (High &gt; Low)</option>
                  <option value="DESC">Rating (Highest)</option>
                  <option value="ASC">Rating (Lowest)</option>
                  <option value="ASC">Model (A - Z)</option>
                  <option value="DESC">Model (Z - A)</option>
                </select>
              </div>
              <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="row">

          @foreach($products as $product)
            <div class="product-layout col-md-4 col-xs-6 shop-page-product">
                <div class="mb_30">
                    @include('frontend.home_page.product')
                </div>
            </div>
          @endforeach

          </div>
          <div class="pagination-nav text-center mt_50">
            <ul>
              <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>


      
    </div>
   <!-- =====  CONTAINER END  ===== -->
   
   @include('frontend.modals.product_details')




  @endsection

  @section('scripts')
      <!--Plugin JavaScript file-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    
    <script>
    $( document ).ready(function() {
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 1000,
            from: 200,
            to: 500,
            grid: true
        });
    });
   
    </script>
    @endsection