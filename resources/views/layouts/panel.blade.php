<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edukasi</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/icons/icomoon/styles.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/icons/fontawesome/styles.min.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/bootstrap.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/core.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/components.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/colors.css') !!}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/loaders/pace.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/core/libraries/jquery.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/core/libraries/bootstrap.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/loaders/blockui.min.js') !!}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/visualization/d3/d3.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/visualization/d3/d3_tooltip.js') !!}"></script>
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/switchery.min.js') !!}"></script> --}}
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/selects/bootstrap_multiselect.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/ui/moment/moment.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/pickers/daterangepicker.js') !!}"></script>

	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/selects/select2.min.js') !!}"></script>


	<script type="text/javascript" src="{!! asset('panel/assets/js/core/app.js') !!}"></script>
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/form_checkboxes_radios.js') !!}"></script> --}}

	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/components_buttons.js') !!}"></script> --}}
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/login_validation.js') !!}"></script> --}}
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/dashboard.js') !!}"></script> --}}
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/datatables_data_sources.js') !!}"></script> --}}

	<!-- /theme JS files -->


</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="index.html"><img src="{!! asset('panel/assets/images/logo_light.png') !!}" alt=""></a>

		<ul class="nav navbar-nav visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		<p class="navbar-text"><span class="label bg-success">Online</span></p>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					{{-- <img src="{!! asset('panel/assets/images/placeholder.jpg') !!}" alt=""> --}}
					<span>{{ Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					@if (Auth::user()->type == 'Orang tua')
						<li><a href="{{ route('orangtua.profil.detail') }}"><i class="icon-user-plus"></i> My profile</a></li>
					@elseif (Auth::user()->type == 'Admin')
						<li><a href="{{ route('admin.profil.detail') }}"><i class="icon-user-plus"></i> My profile</a></li>
					@endif
					<li>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>

		</ul>
	</div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main sidebar -->
		<div class="sidebar sidebar-main">
			<div class="sidebar-content">
				<!-- User menu -->
				<div class="sidebar-user">
					<div class="category-content">
						<div class="media">
							<div class="media-left">
								<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
									<span class="letter-icon">{{ substr(Auth::user()->name, 0, 1) }}</span>
								</a>
							</div>
							<div class="media-body">
								<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
								<div class="text-size-mini text-muted">
                                    {{-- <p>Admin</p> --}}
									<p>{{ Auth::user()->type }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">

							<!-- Main -->
							@if (Auth::user()->type=="Admin")
								<li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{!! route('admin.dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="{{ request()->is('admin/daftar-pemain-game') ? 'active' : '' }}"><a href="{!! route('admin.user_dashboard') !!}"><i class="icon-user"></i> <span>Daftar Pengguna</span></a></li>
								<li class="{{ request()->is('admin/kelola-kategori-game') ? 'active' : '' }}"><a href="{!! route('admin.gamecategory') !!}"><i class="icon-list2"></i> <span>Kelola Kategori Game</span></a></li>
								<li class="{{ request()->is('admin/kelola-mata-pelajaran') ? 'active' : '' }}"><a href="{!! route('admin.subjectscategory') !!}"><i class="icon-book"></i> <span>Kelola Mata Pelajaran</span></a></li>
								<li class="{{ request()->is('admin/mini-games') ? 'active' : '' }}"><a href="{!! route('admin.minigames') !!}"><i class="icon-puzzle2"></i> <span>Mini Games</span></a></li>
								<li class="{{ request()->is('admin/e-book') ? 'active' : '' }}"><a href="{!! route('admin.ebook') !!}"><i class="icon-book"></i> <span>E-Book</span></a></li>
								<li class="{{ request()->is('admin/bank-soal') ? 'active' : '' }}"><a href="{!! route('admin.banksoal') !!}"><i class="icon-folder2"></i> <span>Bank Soal</span></a></li>

								@else
									<li class="{{ request()->is('orangtua/dashboard') ? 'active' : '' }}"><a href="{!! route('orangtua.dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
									<li class="{{ request()->is('orangtua/registerasi-anak') ? 'active' : '' }}"><a href="{!! route('orangtua.registeration.index2') !!}"><i class="icon-user"></i> <span>Registerasi Anak</span></a></li>
									<li class="{{ request()->is('orangtua/laporan') ? 'active' : '' }}"><a href="{!! route('orangtua.report') !!}"><i class="icon-clipboard3"></i> <span>Laporan</span></a></li>

							@endif

                            <!-- /main -->
						</ul>
					</div>
				</div>
				<!-- /main navigation -->

			</div>
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-default">
				<div class="page-header-content">
					<div class="page-title">
						<h4><b>@yield('page_title')</b></h4>
					</div>
				</div>
			</div>
			<!-- /page header -->
			<div class="page-header-content">
				<div class="page-title" style="padding-top: 0">
					@yield('content_section')

				</div>
			</div>

			<!-- Content area -->
			<div class="content">
				{{-- @yield('content') --}}


				<!-- Footer -->
				 {{-- target="_blank" == untuk new page --}}
				<div class="footer text-muted">
					&copy; 2018. <a href="#">Aplikasi Dashboard Pembelajaran dan Buku Interaktif</a> by <a href="#">Riski Tisnahayu</a>
				</div>
				<!-- /footer -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</div>
<!-- /page container -->
@yield('script')
@include('sweetalert::alert')
</body>
</html>
