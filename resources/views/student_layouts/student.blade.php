<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi &mdash; Edukasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/animate.css') !!}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{!! asset('law/assets/css/icomoon.css') !!}">
	<!-- Bootstrap  -->
	{{-- <link rel="stylesheet" href="{!! asset('law/assets/css/bootstrap.css') !!}"> --}}

	{{-- toastr --}}
	<link rel="stylesheet" href="{!! asset('law/assets/css/toastr.css') !!}">
	<link rel="stylesheet" href="{!! asset('law/assets/css/toastr.min.css') !!}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/magnific-popup.css') !!}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/owl.carousel.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('law/assets/css/owl.theme.default.min.css') !!}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/flexslider.css') !!}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/style.css') !!}">

	<!-- Modernizr JS -->
	<script src="{!! asset('law/assets/js/modernizr-2.6.2.min.js') !!}"></script>

	{{-- modal --}}
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

</head>
<body>
	{{-- MODAL LOGIN --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login Sebagai:</h4>
      </div>
      <div class="modal-body">
		  <div class="row" id="row-login">
			  <div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
  				<a href="{!! route('orangtua.login') !!}"><img src="{!! asset('law/assets/images/mom.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
  					<h3>Orang Tua</h3>
  				</a>
  	  		</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
  				<a href="{!! route('siswa.login') !!}"><img src="{!! asset('law/assets/images/siswa.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
  					<h3>Siswa</h3>
  				</a>
  	  		</div>
  	      </div>
	  </div>
    </div>
  </div>
</div>
<div class="fh5co-loader"></div>
<div id="page">
<nav class="fh5co-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">Edukasi<span>.</span></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="btn-cta2"><a href="{{ URL::to('register')}}"><span>Daftar</span></a></li>
						<li class="btn-cta1"><a href="#" data-toggle="modal" data-target="#myModal"><span>Login</span></a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</nav>
<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
	   	<li style="background-image: url(law/assets/images/bg_1.jpg);">
	   		<div class="overlay-gradient"></div>
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h1>Aplikasi Dashboard Pembelajaran dan Buku Interaktif</h1>
								{{-- <h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2> --}}
								<p><a href="{{ URL::to('register') }}" class="btn btn-primary btn-lg">Gabung Sekarang</a></p>
		   				</div>
		   			</div>
		   		</div>
	   		</div>
	   	</li>
	   	<li style="background-image: url(law/assets/images/bg_2.jpg);">
	   		<div class="overlay-gradient"></div>
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h1>Media Belajar Berbasis Web</h1>
								<h2>Membantu Siswa SMP untuk belajar lebih mudah, kapanpun, dan dimanapun!<a href="http://freehtml5.co/" target="_blank"></a></h2>
								{{-- <p><a class="btn btn-primary btn-lg btn-learn" href="#">Make An Appointment</a></p> --}}
		   				</div>
		   			</div>
		   		</div>
	   		</div>
	   	</li>
	   	<li style="background-image: url(law/assets/images/bg_3.jpg);">
	   		<div class="overlay-gradient"></div>
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h1>Fitur-fitur yang asyik untuk belajar!</h1>
								<h2>Mini Games, E-Book, dan Bank Soal <a href="http://freehtml5.co/" target="_blank"></a></h2>
								{{-- <p><a class="btn btn-primary btn-lg btn-learn" href="#">Make An Appointment</a></p> --}}
		   				</div>
		   			</div>
		   		</div>
	   		</div>
	   	</li>
	  	</ul>
  	</div>
</aside>
		</div>
	</div>
</div>
<div id="fh5co-project">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Fitur yang mendukung asyiknya belajar!</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				{{-- <a href="" onclick="javascript:if(confirm('Maaf, Anda belum login! Silahkan login dulu. Jika belum memiliki akun, Silahkan hubungi orangtua Anda untuk melakukan registerasi!')){window.location.href='{{url('siswa-login') }}'};"><img src="{!! asset('law/assets/images/minigames.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive"> --}}
				<a href="#" class="fitur" onclick="fitur()"><img src="{!! asset('law/assets/images/minigames.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Mini Games</h3>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="#" class="fitur" onclick="fitur()"><img src="{!! asset('law/assets/images/ebook.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">E-Book</h3>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="#" class="fitur" onclick="fitur()"><img src="{!! asset('law/assets/images/banksoal.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Bank Soal</h3>
				</a>
			</div>
		</div>
	</div>
</div>
<footer id="fh5co-footer" role="contentinfo">
	<div class="container">
		<div class="row copyright">
			<div class="col-md-12 text-center">
				<p>
					<small class="block">&copy; 2019 Aplikasi Dashboard Pembelajaran dan Buku Interaktif</small>
				</p>
			</div>
		</div>

	</div>
</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

	<script type="text/javascript">
	function fitur(){

		toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-full-width",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "1000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		toastr.error('Oopss! Login dulu! Belum punya akun? Ooppss! Registerasi dulu!','')
	}
	</script>

	<!-- jQuery -->
	<script src="{!! asset('law/assets/js/jquery.min.js') !!}"></script>
	<!-- jQuery Easing -->
	<script src="{!! asset('law/assets/js/jquery.easing.1.3.js') !!}"></script>
	<!-- Bootstrap -->
	<script src="{!! asset('law/assets/js/bootstrap.min.js') !!}"></script>
	<!-- Waypoints -->
	<script src="{!! asset('law/assets/js/jquery.waypoints.min.js') !!}"></script>
	<!-- Stellar Parallax -->
	<script src="{!! asset('law/assets/js/jquery.stellar.min.js') !!}"></script>
	<!-- Carousel -->
	<script src="{!! asset('law/assets/js/owl.carousel.min.js') !!}"></script>
	<!-- Flexslider -->
	<script src="{!! asset('law/assets/js/jquery.flexslider-min.js') !!}"></script>
	<!-- countTo -->
	<script src="{!! asset('law/assets/js/jquery.countTo.js') !!}"></script>
	<!-- Magnific Popup -->
	<script src="{!! asset('law/assets/js/jquery.magnific-popup.min.js') !!}"></script>
	<script src="{!! asset('law/assets/js/magnific-popup-options.js') !!}"></script>
	<!-- Main -->
	<script src="{!! asset('law/assets/js/main.js') !!}"></script>

	{{-- toastr --}}
	<script src="{!! asset('law/assets/js/toastr.min.js') !!}">

	</script>

	</body>
</html>
