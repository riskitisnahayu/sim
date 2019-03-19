@extends('student_layouts.master')

@section('student-content')
<div class="fh5co-loader"></div>
	<div id="page">
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<li><img src="{!! asset('law/assets/images/bg_1.jpg') !!}">
						<div class="overlay-gradient"></div>
							<div class="container">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
										<div class="slider-text-inner">
											<h1>Aplikasi Dashboard Pembelajaran dan Buku Interaktif</h1>
										</div>
									</div>
								</div>
							</div>
					</li>
					<li><img src="{!! asset('law/assets/images/bg_2.jpg') !!}">
						<div class="overlay-gradient"></div>
							<div class="container">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
										<div class="slider-text-inner">
											<h1>Media Belajar Berbasis Web</h1>
											<h2>Membantu Siswa SMP untuk belajar lebih mudah, kapanpun, dan dimanapun!<a href="http://freehtml5.co/" target="_blank"></a></h2>
										</div>
									</div>
								</div>
							</div>
					</li>
					<li><img src="{!! asset('law/assets/images/bg_3.jpg') !!}">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
									<div class="slider-text-inner">
										<h1>Fitur-fitur yang asyik untuk belajar!</h1>
										<h2>Mini Games, E-Book, dan Bank Soal <a href="http://freehtml5.co/" target="_blank"></a></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
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
				<a href="{!! route('student.games') !!}"><img src="{!! asset('law/assets/images/minigames.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Mini Games</h3>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="{!! route('student.ebook') !!}"><img src="{!! asset('law/assets/images/ebook.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">E-Book</h3>
				</a>
			</div>
			<div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
				<a href="{!! route('student.banksoal') !!}"><img src="{!! asset('law/assets/images/banksoal.jpg') !!}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
					<h3 style="color: black">Bank Soal</h3>
				</a>
			</div>
		</div>
	</div>
</div>

@endsection
