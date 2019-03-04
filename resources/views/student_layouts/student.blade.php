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

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
<div class="fh5co-loader"></div>

{{-- MODAL Daftar --}}
{{-- <div class="modal fade" id="myModal2" tabindex="-1" role="dialog2" aria-labelledby="myModalLabel2">
	<div class="modal-dialog2" role="document">
		<div class="modal-content op">
		  <div class="modal-header" id="header-daftar">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel2" style="text-align: center">Daftar Sebagai Orang tua</h4>
		  </div>
		  <div class="modal-body">
			  <div class="row">
				<fieldset class="content-group">
					<div class="form-group">
				      	<label class="control-label col-lg-2">Nama Orang Tua</label>
				      	<div class="col-lg-10">
				      		<input type="text" id="form-control" class="form-control" name="name" >
				      	</div>
			      	</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Email</label>
						<div class="col-lg-10">
							<input type="text" id="form-control" class="form-control" name="email" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Username</label>
						<div class="col-lg-10">
							<input type="text" id="form-control" class="form-control" name="username" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Password</label>
						<div class="col-lg-10">
							<input type="password" id="form-control" class="form-control" name="password" >
						</div>
					</div>
				</fieldset>
			  </div>
			  <div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Daftar</button>
			  </div>
		  </div>
	  </div>
	</div>
</div>
<div class="fh5co1-loader"></div> --}}

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
						{{-- <li class="active"><a href="index.html">Home</a></li>
						<li><a href="practice.html">Practice Areas</a></li>
						<li><a href="won.html">Won Cases</a></li>
						<li class="has-dropdown">
							<a href="blog.html">Blog</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li> --}}
						{{-- <li class="btn-cta"><a href="#" data-toggle="modal2" data-target="#myModal2"><span>Daftar</span></a></li> --}}
						<li class="btn-cta2"><a href="{{ URL::to('register')}}"><span>Daftar</span></a></li>
						<li class="btn-cta1"><a href="#" data-toggle="modal" data-target="#myModal"><span>Login</span></a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</nav>

<!-- Primary modal -->
{{-- <div id="modal_theme_primary" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Daftar</h6>
			</div>

			<div class="modal-body">
				<h6 class="text-semibold">Text in a modal</h6>
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

				<hr>

				<h6 class="text-semibold">Another paragraph</h6>
				<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
				<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div> --}}
<!-- /primary modal -->

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

{{-- <div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center animate-box">
				<span class="icon"><i class="icon-user"></i></span>
				<span class="fh5co-counter js-counter" data-from="0" data-to="27539" data-speed="5000" data-refresh-interval="50"></span>
				<span class="fh5co-counter-label">Satisfied Clients</span>
			</div>
			{{-- <div class="col-md-3 text-center animate-box"> --}}
				{{-- <span class="icon"><i class="icon-speech-bubble"></i></span>
				<span class="fh5co-counter js-counter" data-from="0" data-to="23563" data-speed="5000" data-refresh-interval="50"></span>
				<span class="fh5co-counter-label">Cases Won</span>
			</div>
			<div class="col-md-3 text-center animate-box">
				<span class="icon"><i class="icon-trophy"></i></span>
				<span class="fh5co-counter js-counter" data-from="0" data-to="5067" data-speed="5000" data-refresh-interval="50"></span>
				<span class="fh5co-counter-label">Awards Won</span>
			</div>
			<div class="col-md-3 text-center animate-box">
				<span class="icon"><i class="icon-users"></i></span>
				<span class="fh5co-counter js-counter" data-from="0" data-to="2587" data-speed="5000" data-refresh-interval="50"></span>
				<span class="fh5co-counter-label">Lawyers</span>
			</div>
		</div>
	</div>
</div> --}}

{{-- <div id="fh5co-content">
	<div class="video fh5co-video" style="background-image: url(images/video.jpg);">
		<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
		<div class="overlay"></div>
	</div>
	<div class="choose animate-box">
		<div class="fh5co-heading">
			<h2>Why Choose Us?</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
		</div>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
			Adoption Law 50%
			</div>
		</div>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%">
			Family Law 80%
			</div>
		</div>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%">
			Real Estate Law 70%
			</div>
		</div>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%">
			Personal Injury Law 40%
			</div>
		</div>
	</div>
</div> --}}

{{-- <div id="fh5co-practice" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Fitur yang mendukung asyiknya belajar!</h2> --}}
				{{-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> --}}
			{{-- </div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-home"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Real Estate Law</a></h3> --}}
						{{-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> --}}
						{{-- <p><a class="btn btn-primary btn-lg" href="#">Mini Games</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-eye"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Insurance Law</a></h3> --}}
						{{-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> --}}
						{{-- <p><a class="btn btn-primary btn-lg" href="#">E-Book</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-shopping-cart"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Business Law</a></h3> --}}
						{{-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> --}}
						{{-- <p><a class="btn btn-primary btn-lg" href="#">Bank Soal</a></p>
					</div>
				</div>
			</div> --}}
			{{-- <div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-umbrella"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Personal Injury</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div> --}}
			{{-- <div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-heart"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Medical Neglegence</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-help"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Criminal Defense</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div> --}}
			{{-- <div class="col-md-12 text-center animate-box">
				<p><a class="btn btn-primary btn-lg btn-learn" href="#">View More</a></p>
			</div> --}}
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
				<a href="#"><img src="{!! asset('law/assets/images/minigames.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Mini Games</h3>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="#"><img src="{!! asset('law/assets/images/ebook.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">E-Book</h3>
					{{-- <span>Atty. John Doe</span> --}}
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="#"><img src="{!! asset('law/assets/images/banksoal.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Bank Soal</h3>
					{{-- <span>Ptr. Jhon Doe</span> --}}
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
