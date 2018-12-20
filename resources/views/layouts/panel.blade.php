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
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/selects/bootstrap_multiselect.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/ui/moment/moment.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/pickers/daterangepicker.js') !!}"></script>

	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/selects/select2.min.js') !!}"></script>


	<script type="text/javascript" src="{!! asset('panel/assets/js/core/app.js') !!}"></script>
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
						<img src="{!! asset('panel/assets/images/placeholder.jpg') !!}" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
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
								<a href="#" class="media-left"><img src="{!! asset('panel/assets/images/placeholder.jpg') !!}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									{{-- <span class="media-heading text-semibold">Riski Tisnahayu</span> --}}
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
								{{-- <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li> --}}
								<li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{!! route('admin.dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								@if (Auth::user()->type=="Admin")
									<li class="{{ request()->is('') ? 'active' : '' }}"><a href="{!! route('admin.minigames') !!}"><i class="icon-user"></i> <span>Daftar Pemain Game</span></a></li>
									<li class="{{ request()->is('admin/kelola-kategori-game') ? 'active' : '' }}"><a href="{!! route('admin.gamecategory') !!}"><i class="icon-list2"></i> <span>Kelola Kategori Game</span></a></li>
									<li class="{{ request()->is('admin/mini-games') ? 'active' : '' }}"><a href="{!! route('admin.minigames') !!}"><i class="icon-puzzle2"></i> <span>Mini Games</span></a></li>
									@else
										<li class="{{ request()->is('materi') ? 'active' : '' }}"><a href="index.html"><i class="icon-book"></i> <span>Materi</span></a></li>
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
							<!-- <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4> -->
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
						&copy; 2018. <a href="#">Dashboard Permainan Edukasi</a> by <a href="#">Riski Tisnahayu</a>
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
</body>
</html>
