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

    @yield('css')
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{!! asset('law/assets/css/animate.css') !!}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{!! asset('law/assets/css/icomoon.css') !!}">
	<!-- Bootstrap  -->
	{{-- <link rel="stylesheet" href="{!! asset('law/assets/css/bootstrap.css') !!}"> --}}

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

<div class="fh5co-loader"></div>
<div id="page">
<nav class="fh5co-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
						<div id="fh5co-logo"><a href="/siswa">Edukasi<span>.</span></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="btn-cta2"><a href="{{ route('student.profil') }}"><span style="width:80px;height: 40px;text-align:center;padding:10px">Profil</span></a></li>
						<li class="btn-cta3"><a href="#">
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
							<span style="width:80px;height: 40px;text-align:center;padding:10px">Logout</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
</div>

@yield('student-content')

<footer id="fh5co-footer" role="contentinfo">
	<div class="container">
		<div class="row row-pb-md">

		<div class="row copyright">
			<div class="col-md-12 text-center">
				<p>
					<small class="block">&copy; 2019 Aplikasi Dashboard Pembelajaran dan Buku Interaktif</small>
				</p>
				{{-- <p>
					<ul class="fh5co-social-icons">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-email"></i></a></li>
					</ul>
				</p> --}}
			</div>
		</div>

	</div>
</div>
</footer>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<!-- Button trigger modal -->


<!-- Modal -->


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
@yield('script')
</body>
</html>
