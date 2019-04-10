@extends('layouts.login')

@section('form')
	<!-- Tabbed form -->
	<div class="tabbable panel login-form width-400">
		<ul class="nav nav-tabs nav-justified">
			{{-- <li class="active"><a href="#basic-tab1" data-toggle="tab"><h6>Daftar Orangtua</h6></a></li> --}}
		</ul>

		<div class="tab-content panel-body">
			<div class="tab-pane fade in active" id="basic-tab1">
				<form action="{!! route('register') !!}" method="POST">
					{{ csrf_field() }}
					{{-- @if ($errors)
						{{ print_r($errors) }}
					@endif --}}
					<div class="text-center">
						<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
						<h5 class="content-group">Buat akun baru <small class="display-block">Orangtua</small> </h5>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="text" name="name" class="form-control" placeholder="Nama">
						<div class="form-control-feedback">
							<i class="icon-user text-muted"></i>
						</div>
						@if ($errors->has('name'))
		                    <span  style="color:red">{{ $errors->first('name') }}</span>
		                @endif
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="text" name="username" class="form-control" placeholder="Username">
						<div class="form-control-feedback">
							<i class="icon-user-check text-muted"></i>
						</div>
						@if ($errors->has('username'))
		                    <span  style="color:red">{{ $errors->first('username') }}</span>
		                @endif
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="email" name="email" class="form-control" placeholder="Email">
						<div class="form-control-feedback">
							<i class="icon-mention text-muted"></i>
						</div>
						@if ($errors->has('email'))
		                    <span  style="color:red">{{ $errors->first('email') }}</span>
		                @endif
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="form-control-feedback">
							<i class="icon-user-lock text-muted"></i>
						</div>
						@if ($errors->has('password'))
		                    <span  style="color:red">{{ $errors->first('password') }}</span>
		                @endif
					</div>

					<button type="submit" class="btn bg-indigo-400 btn-block">Registerasi <i class="icon-circle-right2 position-right"></i></button>
				</form>
			</div>
		</div>

	</div>
	<!-- /tabbed form -->

@endsection
