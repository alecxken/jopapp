<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EKE-NET</title>
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- bootstrap styles-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- google font -->
{{-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
 --}}<!-- ionicons font -->
<link href="css/ionicons.min.css" rel="stylesheet">
<!-- animation styles -->
<link rel="stylesheet" href="css/animate.css" />
<!-- custom styles -->
<link href="css/custom-green.css" rel="stylesheet" id="style">
<!-- owl carousel styles-->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.transitions.css">
<!-- magnific popup styles -->
<link rel="stylesheet" href="css/magnific-popup.css">
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- preloader start -->
{{-- <div id="preloader">
  <div id="status"></div>
</div> --}}
<!-- preloader end --> 

<!-- wrapper start -->
<div class="wrapper">
  <!--  style="background: -webkit-linear-gradient(left,#005b82 15%,#0082bb 100%);" -->
  <!-- header toolbar start -->
  <div class="header-toolbar"  >
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
              <!--   <li class="hidden-xs"><a href="#">advertisement</a></li> -->
                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">log in</a></li>
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                <li><a  href="#">About</a></li>
              </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
  
  <!-- sticky header start -->
  <div class="sticky-header" style="background: -webkit-linear-gradient(left,#D1EECE 15%,#fff 100%);"  > 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="/">eke</a></div>
       <!--  <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="{{asset('/images/kenya.png')}}" height="80px" width="100px"></div> -->
      </div>
    </div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer">
      @include('layouts.navig')
    </div>
    <!-- nav and search end--> 
  </div>
  <!-- sticky header end --> 
  <!-- top sec start -->
  
  <div class="container">
      @yield('content')
  </div>
  <!-- top sec end --> 
  
  <!-- data start -->
  
 
  <!-- data end --> 
  
  <!-- Footer start -->
  <footer>
        @include('layouts.footer')
  </footer>
  <!-- Footer end -->
  
@include('layouts.logalmodal')
</div>
<!-- wrapper end --> 

<!-- jQuery --> 
<script src="js/jquery.min.js"></script> 
<!--jQuery easing--> 
<script src="js/jquery.easing.1.3.js"></script> 
<!-- bootstrab js --> 
<script src="js/bootstrap.js"></script> 
<!--style switcher--> 
<script src="js/style-switcher.js"></script> <!--wow animation--> 
<script src="js/wow.min.js"></script> 
<!-- time and date --> 
<script src="js/moment.min.js"></script> 
<!--news ticker--> 
<script src="js/jquery.ticker.js"></script> 
<!-- owl carousel --> 
<script src="js/owl.carousel.js"></script> 
<!-- magnific popup --> 
<script src="js/jquery.magnific-popup.js"></script> 
<!-- weather --> 
<script src="js/jquery.simpleWeather.min.js"></script> 
<!-- calendar--> 
<script src="js/jquery.pickmeup.js"></script> 
<!-- go to top --> 
<script src="js/jquery.scrollUp.js"></script> 
<!-- scroll bar --> 
<script src="js/jquery.nicescroll.js"></script> 
<script src="js/jquery.nicescroll.plus.js"></script> 
<!--masonry--> 
<script src="js/masonry.pkgd.js"></script> 
<!--media queries to js--> 
<script src="js/enquire.js"></script> 
<!--custom functions--> 
<script src="js/custom-fun.js"></script>
</body>
</html>