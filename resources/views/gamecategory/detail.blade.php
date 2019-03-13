@extends('layouts.panel')

@section('page_title')
    Detail Kategori Game

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
        <form class="form-horizontal"  enctype="multipart/form-data" method="post">
        	<fieldset class="content-group">
        		<div class="form-group">
        			<label class="control-label col-lg-2">Nama Kategori</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="name" placeholder="{{ $gamecategories->name }}" readonly="" type="text">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Deskripsi</label>
        			<div class="col-lg-10">
        				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="{{ $gamecategories->description }}" readonly="" type="text"></textarea>
        			</div>
        		</div>
        	</fieldset>
            <div class="row mt-3">
                <div class="col-lg" style="text-align: center">
                  <button type="button" class="btn btn-success" onclick="location.href='/admin/kelola-kategori-game';">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
