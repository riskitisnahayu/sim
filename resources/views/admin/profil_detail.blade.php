@extends('layouts.panel')

@section('page_title')
    Detail Profil Admin
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
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        	<fieldset class="content-group">
                <legend class="text-bold">Data Admin</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Nama </label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="name" placeholder="{{ $user->name }}" readonly>
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Username</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="username" placeholder="{{ $user->username }}" readonly>
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Email</label>
        			<div class="col-lg-10">
        				<input type="email" class="form-control" name="email" placeholder="{{ $user->email }}" readonly>
        			</div>
    		</div>
        	</fieldset>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-success" onclick="location.href='/admin/profil-edit'" style="margin-top: -38px">Edit</button>
                </div>
            </div>
            <fieldset class="content-group">
                <legend class="text-bold">Password Admin</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password</label>
        			<div class="col-lg-10">
        				<input type="password" class="form-control" name="password" placeholder="******" readonly>
        			</div>
        		</div>
            </fieldset>
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-success" onclick="location.href='/admin/profil-password-edit'" style="margin-top: -38px">Edit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
