<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <title>@yield('title')</title> --}}

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{!! asset('panel/assets/css/icons/icomoon/styles.css') !!}" rel="stylesheet" type="text/css">
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
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>

	<script type="text/javascript" src="{!! asset('panel/assets/js/core/app.js') !!}"></script>
	{{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/login_validation.js') !!}"></script> --}}
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Form with validation -->
					@yield('form')
                    <!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
