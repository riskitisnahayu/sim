@extends('layouts.panel')

@section('page_title')
    Profil Orang tua
@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
        {{-- Validasi  --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
        @endif

        <form class="form-horizontal" action="{!! route('orangtua.password.edit') !!}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        	<fieldset class="content-group">
                <legend class="text-bold">Password Orangtua</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password lama</label>
        			<div class="col-lg-10">
                        <input type="password" id="oldPassword" class="form-control" name="oldPassword" value="">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password baru</label>
        			<div class="col-lg-10">
                        <input id="password" placeholder="" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Konfirmasi password baru</label>
        			<div class="col-lg-10">
                        <input id="password-confirm" type="password" placeholder="" class="form-control" name="password_confirmation">
        			</div>
        		</div>
        	</fieldset>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='/orangtua/profil-detail';">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
