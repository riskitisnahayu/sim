@extends('layouts.login')

@section('form')
    <form method="POST" action="{{ route('login') }}" class="form-validate" style="padding-top:50px">
        {{ csrf_field() }}
		<div class="panel panel-body login-form">
			<div class="text-center">
				<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
				<h5 class="content-group">Login Admin </h5>
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="text" class="form-control" placeholder="Email" name="email" required="required">
				<div class="form-control-feedback">
					<i class="icon-user-check text-muted"></i>
				</div>
                @if ($errors->has('email'))
                    <span>{{ $errors->first('email') }}</span>
                @endif
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="password" class="form-control" placeholder="Password" name="password" required="required">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
                @if ($errors->has('password'))
                    <span>{{ $errors->first('password') }}</span>
                @endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
			</div>
	</form>
@endsection
