@extends('layouts.login')

@section('form')
    <form method="POST" action="{{ route('login') }}" class="form-validate" style="padding-top:50px">
        {{ csrf_field() }}
        <input type="hidden" name="role" value="other">
		<div class="panel panel-body login-form">
			<div class="text-center">
				<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
				<h5 class="content-group">Login</h5>
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="text" class="form-control" placeholder="Email" name="email">
				<div class="form-control-feedback">
					<i class="icon-user-check text-muted"></i>
				</div>
                @if ($errors->has('email'))
                    <span style="color:red">{{ $errors->first('email') }}</span>
                @endif
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="password" class="form-control" placeholder="Password" name="password">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
                @if ($errors->has('password'))
                    <span style="color:red">{{ $errors->first('password') }}</span>
                @endif
			</div>

            <div class="form-group login-options">
				<div class="row">
                    <div class="col-sm-6 text-left">
                        <a href="{!! route('siswa.login') !!}">Login siswa?</a>
                    </div>
					<div class="col-sm-6 text-right">
						<a href="{!! route('password.request') !!}">Lupa password?</a>
					</div>
				</div>
			</div>

			<div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
				<button type="button" class="btn bg-indigo-400 btn-block" onclick="location.href='/register'">Registerasi Orang tua<i class="icon-circle-right2 position-right"></i></button>
			</div>
	</form>
@endsection
