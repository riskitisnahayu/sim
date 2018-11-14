@extends('layouts.panel')

@section('page_title')
    Detail Game

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
            {{-- <div class="panel-heading">
                <h5>Tambah Mini Games</h5>

            </div>
            <br> --}}
            {{-- enctype=untuk upload file --}}
    <form class="form-horizontal"  enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		{{-- <legend class="text-bold">Basic inputs</legend> --}}

    		<div class="form-group">
    			<label class="control-label col-lg-2">Nama</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="name" placeholder="{{ $games->name }}" readonly="" type="text">
    			</div>
    		</div>

            <div class="form-group">
            	<label class="control-label col-lg-2">Level</label>
            	<div class="col-lg-10">
                    <input type="text" class="form-control" name="name" placeholder="{{ $games->level }}" readonly="" type="text">
                </div>
            </div>

            <div class="form-group">
    			<label class="control-label col-lg-2">Foto</label>
    			<div class="col-lg-10">
    				<img src="{{ url('images/'.$games->image)}}" style="width:150px" alt="">
    			</div>
    		</div>

            <div class="form-group">
    			<label class="control-label col-lg-2">Deskripsi</label>
    			<div class="col-lg-10">
    				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="{{ $games->description }}" readonly="" type="text"></textarea>
    			</div>
    		</div>

    		<div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" name="url" class="form-control" placeholder="{{ $games->url }}" readonly="" type="text">
    			</div>
    		</div>
    	</fieldset>
        <div class="row mt-3">
            <div class="col-lg" style="text-align: center">
              <button type="button" class="btn btn-success" onclick="location.href='/admin/mini-games';">Kembali</button>
            </div>
        </div>
    </form>

</div>


</div>

@endsection
