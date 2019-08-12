
 @extends('frontend.layouts.layout')

 @section('content')
    <!-- =====  BANNER STRAT  ===== -->
    <div class="banner">
      <div class="main-banner owl-carousel">
      @foreach($products->where('is_featured', 1)->take(5) as $product)
        <div class="item"><a href="#"><img src="{{ $product->banner_image }}" alt="Main Banner" class="img-responsive" /></a></div>
      @endforeach
      </div>
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">

      <!-- =====  SUB BANNER1  STRAT ===== -->
        @include('frontend.home_page.sub_banner1')
      <!-- =====  SUB BANNER1 END ===== -->
      
      <!-- =====  PRODUCT TAB  ===== -->
      @if($products)
        @include('frontend.home_page.products')
      @endif
      <!-- =====  PRODUCT TAB  END ===== -->
      

      <div class="row">
        <!-- =====  SUB BANNER1  STRAT ===== -->
        @if(($banner_image = $products->where('composition_id', 2)->first()))
          @include('frontend.home_page.sub_banner2')
        @endif 
        <!-- =====  SUB BANNER1 END ===== -->

        
        <!-- =====  PRODUCT TAB  ===== -->
        @if(($week_deals = $products->where('composition_id', 3)))
          @include('frontend.home_page.deal_of_week')
        @endif
        <!-- =====  PRODUCT TAB  END===== -->
      
          
        <!-- =====  Blog ===== -->
        @include('frontend.home_page.blog')
        <!-- =====  Blog End===== --> 

      </div>

     

      
    </div>
    <!-- =====  CONTAINER END  ===== -->

   @include('frontend.modals.product_details')

   @endsection