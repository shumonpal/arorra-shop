l<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">

  <title>{{config('app.name')}} | @yield('title', 'Home') </title>

  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="/frontend/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="/frontend/css/bootstrap.css" />

  @yield('styles')

  <link rel="stylesheet" type="text/css" href="/frontend/css/style.css">
  <link rel="stylesheet" type="text/css" href="/frontend/css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="/frontend/css/owl.carousel.css">
  <link rel="shortcut icon" href="/frontend/images/favicon.png">
  <link rel="apple-touch-icon" href="/frontend/images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/frontend/images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/frontend/images/apple-touch-icon-114x114.png">
  <link rel="stylesheet" type="text/css" href="/frontend/css/mystyle.css">

  
  <link rel="stylesheet" href="/dist/iziModal/css/iziModal.css">
  <link rel="stylesheet" href="/dist/iziToast/dist/css/iziToast.css">


  
  <script src="/frontend/js/jQuery_v3.1.1.min.js"></script>
  <script src="/dist/iziModal/js/iziModal.js"></script>
  <script src="/dist/iziToast/dist/js/iziToast.js"></script>
  <script type="text/javascript">
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
          ]); ?>;
      var CSRF_TOKEN = '{{csrf_token()}}';
  </script>
</head>

<body>

 <!-- =====  LODER  ===== -->
 <div class="loder"></div>
  <div class="wrapper">
    
    @include('frontend.layouts.welcome_modal')
    <!-- =====  HEADER START  ===== -->
    @include('frontend.layouts.welcome_modal')

    <header id="header">
      
        @include('frontend.layouts.header_top')
        @include('frontend.layouts.header')
      
    </header>
    <!-- =====  HEADER END  ===== -->

@yield('content')
    
    <!-- =====  FOOTER START  ===== -->
    @include('frontend.layouts.footer')
    <!-- =====  FOOTER END  ===== -->


  </div>
  <a id="scrollup"></a>
  <script src="/frontend/js/owl.carousel.min.js"></script>
  <script src="/frontend/js/bootstrap.min.js"></script>
  <script src="/frontend/js/jquery.magnific-popup.js"></script>
  <script src="/frontend/js/jquery.firstVisitPopup.js"></script>

  @yield('scripts')
  <script src="/frontend/js/custom.js"></script>
  <script src="/frontend/js/myscript.js"></script>
</body>

</html>