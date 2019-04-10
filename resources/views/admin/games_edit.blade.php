@extends('layouts.panel')

@section('page_title')
    Edit Game

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

    <form class="form-horizontal" action="{!! route('admin.games.update',['id'=>$games->id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		<div class="form-group">
    			<label class="control-label col-lg-2">Nama</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="name" value="{{ $games->name }}">
    			</div>
    		</div>

            <div class="form-group">
            	<label class="control-label col-lg-2">Kategori</label>
            	<div class="col-lg-10">
                    <select class="form-control" name="gamecategories_id">
                        @foreach($gamecategories as $value)
                           <option value="{{$value->id}}" {{collect(old('gamecategory'))->contains($value->id) ? 'selected':''}} @if($value->id == $games['gamecategories_id']) selected='selected' @endif>{{$value->name}}</option>
                       @endforeach
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
    				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="Tulis deskripsi..">{{ $games->description }}</textarea>
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
                <button type="button" class="btn btn-danger" onclick="location.href='/admin/mini-games';">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>

</div>


</div>

@endsection
