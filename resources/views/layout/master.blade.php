<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Artfest</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no">
<meta name="description" content="Default Description">
<meta name="keywords" content="fashion, store, E-commerce">
<meta name="robots" content="*">
<link rel="shortcut icon" href="#" type="image/x-icon">
<link rel="icon" href="{{asset('images/hdkd2019.png')}}" type="image/ico">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{asset('stylesheet/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('stylesheet/font-awesome.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('stylesheet/jquery.mobile-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('stylesheet/style.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('stylesheet/responsive.css')}}" media="all">
<link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert/sweetalert2.min.css')}}">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<meta name="viewport" content="initial-scale=1.0, width=device-width">

</head>
<body>
<div id="page">
 <header>
  
  <div id="header" style="background-color: black;">
    <div class="header-container container">
	 <div class="row">
      <div class="logo"> <a href="{{URL::route('index')}}" title="HDKD">
        <div><img src="{{asset('images/hdkd2019.png')}}" alt="Flavours Store"></div>
        </a> </div>
      <div class="fl-nav-menu">
       
          @include('layout.menu')
        </div>
        <!--row-->
      </div>
    </div>
	</div>	
  </header>
  <!--container-->
  @yield('content')

  
  <footer>
    <!-- BEGIN INFORMATIVE FOOTER -->
    <div class="footer-inner">
	<div class="newsletter-row">
      <div class="container">
        <div class="row"> 
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col"> 
            <!-- Footer Payment Link -->
            <div class="payment-accept">
              <div><img src="{{asset('images/always.png')}}" alt="payment1"> <img src="{{asset('images/wbbm.png')}}" alt="payment2"> <img src="{{asset('images/egov.png')}}" alt="payment3"><img src="{{asset('images/pusdatin.png')}}" alt="payment3"></div>
            </div>
          </div>
          <!-- Footer Newsletter -->
          
        </div>
      </div>
      <!--footer-column-last--> 
    </div>
	  
      <!--container-->
    </div>
    <!--footer-inner-->
    
    <div class="footer-middle">
      <div class="container">
        <div class="row">
          <div class="row"> </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </div>
    <!--footer-middle-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright">© 2019 Pusdatin. All Rights Reserved.</div>
         
        </div>
        <!--row-->
      </div>
      <!--container-->
    </div>
    <!--footer-bottom-->
    <!-- BEGIN SIMPLE FOOTER -->
  </footer>
  <!-- End For version 1,2,3,4,6 -->
  
</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
  <ul>
    <li>
      <div class="home"><a href="{{URL::route('index')}}"><i class="icon-home"></i>Home</a> </div>
    </li>
    <li><a href="{{URL::route('pertandingan')}}">Pertandingan</a>
    </li>
  </ul>
</div> 

<!-- JavaScript -->
<script>
  <?php 
    $domain = 'http://'.$_SERVER['HTTP_HOST']; 
  ?>
  var APIurl = "{{url('/')}}/";
  var base_path = "{{url('/')}}";
</script>
<!-- <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> -->
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revslider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mobile-menu.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/sweetalert/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/helper/helper.js')}}"></script>
@yield('js')

</body>
</html>
