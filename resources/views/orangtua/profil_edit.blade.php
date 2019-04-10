@extends('layouts.panel')

@section('page_title')
    Data Orang tua
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
        <form class="form-horizontal" action="{!! route('orangtua.profil.edit') !!}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        	<fieldset class="content-group">
                <legend class="text-bold">Data Orangtua</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Nama </label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="name" value="{{ $ortu->user['name'] }}">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Username</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="username" value="{{ $ortu->user['username'] }}">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Email</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="email" value="{{ $ortu->user['email'] }}">
        			</div>
        		</div>
        	</fieldset>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-danger" onclick="location.href='/orangtua/profil-detail';">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
