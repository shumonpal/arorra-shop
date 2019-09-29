<div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="header-top-left">
                <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8">
              <ul class="header-top-right text-right">
              @if(!Auth::guard()->check())
                <li class="account dropdown"> <span class="dropdown-toggle" id="dropdownMenu0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">My Account <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu0">
                    <?php $url = url('/login'); ?>
                    <li><a href="{{url('/login')}}" >Login</a></li>
                    <!-- <li><a href="#" onclick="showModalForm('Login', '{{$url}}')">Login</a></li> -->
                    <?php $url = url('/register'); ?>
                    <!-- <li><a href="#" onclick="showModalForm('Registration', '{{$url}}')">Registration</a></li> -->
                    <li><a href="{{url('/register')}}" >Registration</a></li>
                  </ul>
                </li>
                @else
                <li class="account dropdown"> <span class="dropdown-toggle" id="dropdownMenu01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Hi {{title_case(Auth::user()->name)}}! <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu01">
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{route('cart')}}">Cart</a></li>
                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                    <li><a href="{{route('user_order')}}">Orders</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </ul>
                </li>
                @endif
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Language <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Currency <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">€ Euro</a></li>
                    <li><a href="#">£ Pound Sterling</a></li>
                    <li><a href="#">$ US Dollar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>