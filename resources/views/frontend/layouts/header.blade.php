<div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
                <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{url('/')}}"> <img alt="themini" src="/frontend/images/logo.png"> </a> </div>

            <div class="col-xs-12 col-sm-2 shopcart whishlist-div">
            @include('frontend.carts.mini_wishlist')
            </div>
            <div class="col-xs-6 col-sm-2 shopcart cart-div">
            @include('frontend.carts.mini_cart')
            </div>
          </div>
          <nav class="navbar">
            <p>menu</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="{{url('/')}}">Home</a></li>
                <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection </a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                  @foreach($categories->take(4) as $category)
                    <li class="col-md-2">
                      <ul>
                        <li class="dropdown-header">{{$category->name}}</li>
                        @foreach($category->subcategories as $subcategory)
                        <li><a href="{{ route('shop', ['id' => 'subcategory_id-' . $subcategory->id]) }}">{{title_case($subcategory->name)}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach

                    <li class="col-md-3">
                      <ul>
                        <li id="myCarousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                          @foreach($products->where('is_discount', 1)->take(4) as $key=>$product)
                            <div class="item {{$key == 1 ? 'active' : ''}}"> <a href="#"><img src="/{{$product->images->first()->image}}" class="img-responsive" alt="{{$product->name}}"></a></div>
                            <!-- End Item -->
                          @endforeach
                          </div>
                          <!-- End Carousel Inner -->
                        </li>
                        <!-- /.carousel -->
                      </ul>
                    </li>
                  </ul>
                </li>
               
                <!-- <li> <a href="blog_page.html">Blog</a></li> -->
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brand </a>
                  <ul class="dropdown-menu">
                  @foreach($brands as $brand)
                    <li> <a href="{{ route('shop', ['id' => 'brand_id-' . $brand->id]) }}">{{ title_case($brand->name) }}</a></li>
                  @endforeach
                  </ul>
                </li>
                <li> <a href="{{ route('shop', ['queryBy' => 'all']) }}">Shop</a></li>
                <li> <a href="about.html">About us</a></li>
                <li> <a href="contact_us.html">Contact us</a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>