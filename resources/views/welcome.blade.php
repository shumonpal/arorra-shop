<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Arrora Inventory') }}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('frontend/css/grayscale.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ARRORA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      
        <i class="fa fa-bars fa-lg"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
          </li>
          @guest
          <li class="nav-item">
            <a href="{{ url('/admin/login') }}" class="nav-link">Login</a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ url('/admin/home') }}" class="nav-link">Inventory</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('admin.logout') }}" class="nav-link logout"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <span class="d-none d-sm-inline-block">Logout</span>
                  <i class="fa fa-sign-out"></i>
              </a>

              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">{{ config('app.name') }}</h1>
        <h4 class="text-right font-weight-light inv"><small><i>inventory</i></small></h4>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">The regular process of workflow in your company.
        Everyday transactions, sales, purchases and reporting, all of the records keep in front of your eyes by this inventory management system.
        </h2>
        @guest
        <a href="{{ url('/admin/login') }}" class="btn btn-primary">Go to Application</a>
        @else
        <a href="{{ url('/admin/home') }}" class="btn btn-primary">Go to Application</a>
        @endguest
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section text-left">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <img src="/frontend/img/profile.jpg" class="img-fluid" alt="profile picture" width="200"></div>
        <div class="col-lg-9">
          <h2 class="text-white mb-4">Developed by Shumon</h2>
          <p class="text-white-50">Web artisan, front-end(html, css, bootstrap, javascript, jquery, ajax) and back-end web developer with deeply knowledge in PHP, Laravel and WordPress. 
            Leverage technical, and problem solving skills to create fully responsive dynamic website, modern and secure web applications. I also develop RESTful API. Continued education has allowed me to stay ahead
             of the curve and deliver exceptional work to each employer. l’ve worked for both- full-time and contract. Overalls code is my Valentines.

        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5" style="margin-bottom: 0rem !important;">
        <div class="col-xl-7 col-lg-5" style="background-color: #424242;">
          <img class="img-fluid" src="/frontend/img/inventory-m2.png" alt="" style="">
        </div>
        <div class="col-xl-5 col-lg-6">
          <div class="featured-text text-center text-lg-left">
            <h4>Arrora Inventory</h4>
            <p class="text-black-50 mb-0">This inventory management System is really wonderful software for any types of warehouse and shop. You can use it without any hassle</p>
            <ul>
              <li>Product Management System</li>
              <li>Barcode Management System</li>
              <li>Customer Management System</li>
              <li>Supplier/vendor Management System</li>
              <li>Product Purchase Management System</li>
              <li>Stock Management System</li>
              <li>Account Management System</li>
              <li>Different Accounts Management System</li>
              <li>Invocie System</li>
              <li>Software Settings System</li>
              <li>Multi Language System</li>
              <li>User Role and Permission System</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <!-- <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="/img/demo-image-01.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Misty</h4>
                <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- Project Two Row -->
      <!-- <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="/img/demo-image-02.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Mountains</h4>
                <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section> -->

  <!-- Signup Section -->
  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          <i class="fa fa-paper-plane fa-2x mb-2 text-white"></i>
          <h2 class="text-white mb-5">Subscribe to receive updates!</h2>

          <form class="form-inline d-flex">
            <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Enter email address...">
            <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
          </form>
          <p class="text-light mt-5">Or whats up: +6593485089</p>

        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <!-- <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">4923 Market Street, Orlando FL</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">hello@yourdomain.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+1 (555) 902-8832</div>
            </div>
          </div>
        </div>
      </div> -->

      <div class="social d-flex justify-content-center">
        <a href="https://youtube.com/shumonbalok" class="mx-2">
          <i class="fa fa-youtube"></i>
        </a>
        <a href="https://facebook.com/shumon.pal" class="mx-2">
          <i class="fa fa-facebook-f"></i>
        </a>
        <a href="https://github.com/shumonbalok" class="mx-2">
          <i class="fa fa-github"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Arrora Inventory 2019
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('frontend/js/grayscale.min.js')}}"></script>

</body>

</html>
