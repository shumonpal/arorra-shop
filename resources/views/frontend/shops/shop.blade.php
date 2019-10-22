
@extends('frontend.layouts.layout')
@section('styles')
   <!--Plugin CSS file with desired skin-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>
   <style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 20px 0px;
		    width: 100%;
  		}
      .inline-block li{
        display:inline-block;
      }
   </style>

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
              
                @include('frontend.left_column.categories')
               
            </div>
          </div>
          <div class="filter left-sidebar-widget mb_50">
            <div class="heading-part mtb_20 ">
              <h2 class="main_title">Refine Search</h2>
            </div>
              <!-- <input type="hidden" name="queryBy" value="all">
              <input type="hidden" name="id" value="{{ request()->query('id') }}">
              <input type="hidden" name="orderBy" value="{{ request()->query('orderBy') }}"> -->
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
                    <ul class="inline-block">
                      <li class="m-r-10">
                        <label class="color-filter" for="color-filter" style="background-color: white;"></label>
                        <input class="checkbox-color-filter products-filter {{request()->query('color') == '' ? 'color' : ''}}" type="radio" name="color" value=""
                           {{request()->query('color') == '' ? 'checked="checked"' : ''}}>                      
                      </li>
                      <li class="m-r-10">
                        <label class="color-filter" for="color-filter" style="background-color: black;"></label>
                        <input class="checkbox-color-filter products-filter {{request()->query('color') == 'black' ? 'color' : ''}}"
                         type="radio" name="color" value="black"
                         {{request()->query('color') == 'black' ? 'checked="checked"' : ''}}>                      
                      </li>
                      <li class="m-r-10">
                        <label class="color-filter" for="color-filter" style="background-color: green;"></label>
                        <input class="checkbox-color-filter products-filter {{request()->query('color') == 'green' ? 'color' : ''}}" type="radio" name="color" value="green"
                          {{request()->query('color') == 'green' ? 'checked="checked"' : ''}}>                      
                      </li>
                      <li class="m-r-10">
                        <label class="color-filter" for="color-filter" style="background-color: red;"></label>
                        <input class="checkbox-color-filter products-filter {{request()->query('color') == 'red' ? 'color' : ''}}" type="radio" name="color" value="red"
                          {{request()->query('color') == 'red' ? 'checked="checked"' : ''}}>                      
                      </li>
                    </ul>
                  </div>

                  <div class="list-group-item mb_10">
                    <label>Size</label>
                    <div id="filter-group3">
                      <div class="checkbox">
                        <label>
                          <input class="filter-size {{request()->query('size') == '' ? 'size' : ''}}" value="" type="radio" name="size" 
                          {{request()->query('size') == '' ? 'checked="checked"' : ''}}> All (3)</label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input class="filter-size {{request()->query('size') == 'large' ? 'size' : ''}}" value="large" type="radio" name="size"
                          {{request()->query('size') == 'large' ? 'checked="checked"' : ''}}> Big (3)</label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input class="filter-size {{request()->query('size') == 'medium' ? 'size' : ''}}" value="medium" type="radio" name="size"
                          {{request()->query('size') == 'medium' ? 'checked="checked"' : ''}}> Medium (2)</label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input class="filter-size {{request()->query('size') == 'small' ? 'size' : ''}}" value="small" type="radio" name="size"
                          {{request()->query('size') == 'small' ? 'checked="checked"' : ''}}> Small (1)</label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input class="filter-size {{request()->query('size') == 'red' ? 'size' : ''}}" value="x" type="radio" name="size"
                          {{request()->query('size') == 'red' ? 'checked="checked"' : ''}}> Extra large (1)</label>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn  refine-products" data-url="{{request()->url()}}">Refine Search</button>
                </div>
              </div>
          </div>

        </div>

        
        
        <div class="col-sm-8 col-lg-9 mtb_20">
            <div class="category-page-wrapper mb_30" id="filter-bar">
                <div class="list-grid-wrapper pull-left">
                    <div class="btn-group btn-list-grid">
                    <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                    <button type="button" id="list-view" class="btn btn-default list-view"></button>
                    </div>
                </div>
                <div class="sort-wrapper pull-right">
                    <label class="control-label" for="input-sort">Sort By : </label>
                    <div class="sort-inner">
                      <select id="input-sort" class="form-control filter-sort" style="color: #999;"
                        data-url="{{ Request::url() }}">
                          <option value="updated_at-desc" {{request()->query('sort') == 'updated_at-desc' ? 'selected="selected"' : ''}} > Default</option>
                          <option value="name-asc" {{request()->query('sort') == 'name-asc' ? 'selected="selected"' : ''}}> Name (A - Z)</option>
                          <option value="name-desc" {{request()->query('sort') == 'name-desc' ? 'selected="selected"' : ''}}> Name (Z - A)</option>
                          <option value="price-asc" {{request()->query('sort') == 'price-asc' ? 'selected="selected"' : ''}}> Price (Low &gt; High)</option>
                          <option value="price-desc" {{request()->query('sort') == 'updated_at-desc' ? 'selected="selected"' : ''}}> Price (High &gt; Low)</option>
                          <option value="id-desc" {{request()->query('sort') == 'id-desc' ? 'selected="selected"' : ''}}> Rating (Highest)</option>
                          <option value="id-asc" {{request()->query('sort') == 'id-asc' ? 'selected="selected"' : ''}}> Rating (Lowest)</option>
                      </select>
                    <?php
                       $queryStr =  str_after(request()->fullUrl(), '?');
                       $data = explode('=', $queryStr );
                    ?>
                    <!-- <ul class="header-top-right text-right">
                      <li class="dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" 
                        aria-expanded="false" role="button">Defafult <span class="caret"></span> </span>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{route('shop', [$data[0] => $data[1], 'orderBy' => 'name-asc'])}}">Name (A-Z)</a></li>
                          <li><a href="{{route('shop', [$data[0] => $data[1], 'orderBy' => 'name-desc'])}}">Name (Z-A)</a></li>
                          <li><a href="{{route('shop', [$data[0] => $data[1], 'orderBy' => 'price-asc'])}}">Price (Low &gt; High)</a></li>
                          <li><a href="{{route('shop', [$data[0] => $data[1], 'orderBy' => 'price-desc'])}}">Price (High &gt; Low)</a></li>
                        </ul>
                      </li>
                    </ul> -->
                    </div>
                  <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    
                </div>
            </div>

            <div id="products-body" class="endless-pagination" data-next-page="{{$products->appends(request()->query())->nextPageUrl()}}">
              @include('frontend.shops.products')
            </div>

            <div class="ajax-load text-center" style="display:none">
              <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
            </div>


            <!-- <div class="pagination-nav text-center mt_50">
            <ul>
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
            </div> -->
        </div>

        

    <!-- =====  CONTAINER END  ===== -->
        
        
      
      </div>
  </div>

   @include('frontend.modals.product_details')




  @endsection

  <?php
    $price = explode(';', request()->query('price'));
  ?>

  @section('scripts')
      <!--Plugin JavaScript file-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    
    <script>
    $( document ).ready(function() {
        
        
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 5,
            max: 1000,
            from: {{request()->query('price') == '' ? 100 : $price[0]}},
            to: {{request()->query('price') == '' ? 500 : $price[1]}},
            grid: true
        });

   

        $(window).scroll(fatchPosts);

        function fatchPosts() {
          var page = $('.endless-pagination').data('next-page');
          //console.log(page);
          if (page !== null) {

            clearTimeout($.data(this, "scrollCheck"));

            $.data(this, "scrollCheck", setTimeout(function(){
              if($(window).scrollTop() + $(window).height() + 800 >= $(document).height()){
                $('.ajax-load').show();
                $.get(page, function(data) {
                    $('.ajax-load').hide();
                    $("#products-body").append(data.html);
                    $('.endless-pagination').data('next-page', data.next_page); 
                });
              }
            }, 350));
            
          }
        }

    });

    //var page = 1;
    // $(window).scroll(function() {
    //   var page = $('.endless-pagination').data('next-page');
    //    alert(page);
    //     if($(window).scrollTop() + $(window).height()+300 >= $(document).height()) {
    //         var page = $('.endless-pagination').data('next-page');
    //         console.log(page);
    //         loadMoreData(page);
    //     }
    // });


    // function loadMoreData(page){
    //   $.ajax(
    //         {
    //             url: page,
    //             type: "get",
    //             beforeSend: function()
    //             {
    //                $('.ajax-load').show();
    //             }
    //         })
    //         .done(function(data)
    //         {
    //             if(data.html == " "){
    //                 $('.ajax-load').html("No more records found");
    //                 return;
    //             }
    //             $('.ajax-load').hide();
    //             $("#products-body").append(data.html);
    //         })
    //         .fail(function(jqXHR, ajaxOptions, thrownError)
    //         {
    //             alert('server not responding...');
    //         });
    // }

   

    </script>

    
    @endsection