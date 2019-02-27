@extends('layouts.login')

@section('form')
    <!-- Password recovery -->
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <form method="POST" action="{!! route('password.email') !!}" class="form-validate" style="padding-top:100px">
        {{ csrf_field() }}
        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                <h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
            </div>

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Your email" required>
                <div class="form-control-feedback">
                    <i class="icon-mail5 text-muted"></i>
                </div>
            </div>

            <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
        </div>
    </form>
@endsection
