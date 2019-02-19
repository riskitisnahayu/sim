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
						<div id="fh5co-logo"><a href="index.html">Edukasi<span>.</span></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="btn-cta2"><a href="#"><span>Profil</span></a></li>
						<li class="btn-cta1"><a href="#"><span>Logout</span></a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</nav>

<form class="form-horizontal" action="{!! route('student.ebook') !!}" enctype="multipart/form-data" method="get">

<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>E-Book</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <select class="form-control" name="subjectscategories_id">
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('subjectscategories_id') }}
                            @else
                                ---- Pilih Mata Pelajaran ---
                            @endif
                        </option>
                            @foreach($subjectscategories as $value)
                                <option value="{{$value->id}}" {{collect(old('subjectscategories'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
                            @endforeach
                    </select>
                </div>
    		</div>
			<div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <select name="class" class="form-control" >
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('class') }}
                            @else
                                ---- Pilih Kelas ---
                            @endif
                        </option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
    			</div>
    		</div>

			<div class="row" style="margin-top: 15px; margin-bottom:20px">
            	<div class="col-md-12" style="text-align: center;">
                	<button type="submit" class="btn btn-success">Submit</button>
              	</div>
            </div>
</form>
			<div class="row">
				@foreach ($ebooks as $key => $ebook)
					<div class="col-md-3">
						<div class="thumbnail">
							<div class="thumb" style="text-align:center; padding-top:10px">
								<img src="{!! asset('images') !!}/{{ $ebook->image }}" alt="">
							</div>

							<div class="caption">
								<h4 class="no-margin-top" style="text-align:center"><a href="{{ $ebook->url }}" target="_blank">{{ $ebook->title }}</a></h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>


<footer id="fh5co-footer" role="contentinfo">
	<div class="container">
		<div class="row row-pb-md">
			{{-- <div class="col-md-3 fh5co-widget">
				<h4>Aplikasi Dashboard Pembelajaran dan Buku Interaktif</h4>
				<p>Membantu siswa SMP belajar dengan bantuan teknologi.</p>
			</div> --}}
			{{-- <div class="col-md-3 col-md-push-1">
				<h4>Navigation</h4>
				<ul class="fh5co-footer-links">
					<li><a href="#">Home</a></li>
					<li><a href="#">Practice Areas</a></li>
					<li><a href="#">Won Cases</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">About us</a></li>
				</ul>
			</div> --}}

			{{-- <div class="col-md-3 col-md-push-1">
				<h4>Alamat</h4>
				<ul class="fh5co-footer-links">
					<li>Gedung SV UGM, Sekip Unit 1, <br>
						Blimbing Sari, Caturtunggal, Kec. Depok, Kabupaten Sleman, <br>
						Daerah Istimewa Yogyakarta 55281
					</li> --}}
					{{-- <li><a href="tel://1234567920">+ 1235 2355 98</a></li> --}}
					{{-- <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
					<li><a href="http://gettemplates.co">gettemplates.co</a></li> --}}
				{{-- </ul> --}}
			</div>

			{{-- <div class="col-md-3 col-md-push-1">
				<h4>Opening Hours</h4>
				<ul class="fh5co-footer-links">
					<li>Mon - Thu: 9:00 - 21 00</li>
					<li>Fri 8:00 - 21 00</li>
					<li>Sat 9:30 - 15: 00</li>
				</ul>
			</div> --}}

		</div>

		<div class="row copyright">
			<div class="col-md-12 text-center">
				<p>
					<small class="block">&copy; 2019 Aplikasi Dashboard Pembelajaran dan Buku Interaktif</small>
					{{-- <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small> --}}
				</p>
				<p>
					<ul class="fh5co-social-icons">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-email"></i></a></li>
					</ul>
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

	</body>
</html>
