@extends('layouts.panel')

@section('page_title')
    Edit Game

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
            {{-- <div class="panel-heading">
                <h5>Tambah Mini Games</h5>

            </div>
            <br> --}}
            {{-- enctype=untuk upload file --}}
    <form class="form-horizontal" action="{!! route('admin.games.update',['id'=>$games->id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		{{-- <legend class="text-bold">Basic inputs</legend> --}}

    		<div class="form-group">
    			<label class="control-label col-lg-2">Nama</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="name" value="{{ $games->name }}">
    			</div>
    		</div>

            <div class="form-group">
            	<label class="control-label col-lg-2">Level</label>
            	<div class="col-lg-10">
                    <select name="level" class="form-control" required>
                        <option value="1" @if ($games->level == 1)"selected" @endif >Easy</option>
                        <option value="2" @if ($games->level == 2)"selected" @endif>Medium</option>
                        <option value="3" @if ($games->level == 3)"selected" @endif>Hard</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <img src="{{ URL::to('/images/'.$games->image)}}" style="width:50px" alt="">    
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Foto</label>
    			<div class="col-lg-10">
    				<input type="file" class="form-control" name="image">
    			</div>
    		</div>

            <div class="form-group">
    			<label class="control-label col-lg-2">Deskripsi</label>
    			<div class="col-lg-10">
    				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="Tulis deskripsi.." value="">{{ $games->description }}</textarea>
    			</div>
    		</div>

    		<div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" name="url" class="form-control" value="{{ $games->url }}">
    			</div>
    		</div>
    	</fieldset>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-12" style="text-align: center;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/admin/mini-games';">Batal</button>
          </div>
        </div>
    </form>

</div>


</div>

@endsection
