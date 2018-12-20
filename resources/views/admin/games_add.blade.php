@extends('layouts.panel')

@section('page_title')
    Tambah Game

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
            {{-- <div class="panel-heading">
                <h5>Tambah Mini Games</h5>

            </div>
            <br> --}}
            {{-- enctype=untuk upload file --}}


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

    <form class="form-horizontal" action="{!! route('admin.games.store') !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		{{-- <legend class="text-bold">Basic inputs</legend> --}}

    		<div class="form-group">
    			<label class="control-label col-lg-2">Nama</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="name" >
    			</div>
    		</div>

            <div class="form-group">
            	<label class="control-label col-lg-2">Kategori</label>
            	<div class="col-lg-10">
                    <select class="form-control" name="gamecategories_id">
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('gamecategories_id') }}
                            @else
                                ---- Pilih Kategori ---
                            @endif
                        </option>
	                        @foreach($gamecategories as $value)
	                            <option value="{{$value->id}}" {{collect(old('gamecategories'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
	                        @endforeach
                    </select>
                    {{-- <select name="category" class="form-control" >
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('category') }}
                            @else
                                ---- Pilih Kategori ---
                            @endif
                        </option>
                        <option value="Arcade">Arcade</option>
                        <option value="Classic">Classic</option>
                        <option value="Platform">Platform</option>
                        <option value="Puzzle">Puzzle</option>
                        <option value="Racing">Racing</option>
                        <option value="Shooter">Shooter</option>

                        {{-- <option value="1" @if ($games->category == 1)"selected" @endif>Arcade</option>
                        <option value="2" @if ($games->category == 2)"selected" @endif>Classic</option>
                        <option value="3" @if ($games->category == 3)"selected" @endif>Platform</option>
                        <option value="4" @if ($games->category == 4)"selected" @endif>Puzzle</option>
                        <option value="5" @if ($games->category == 5)"selected" @endif>Racing</option>
                        <option value="6" @if ($games->category == 6)"selected" @endif>Shooter</option> --}}
                    {{-- </select> --}}
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
    				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="Tulis deskripsi.." ></textarea>
    			</div>
    		</div>

    		<div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" name="url" class="form-control" value="">
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
