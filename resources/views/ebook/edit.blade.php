@extends('layouts.panel')

@section('page_title')
    Edit E-Book

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

    <form class="form-horizontal" action="{!! route('ebook.update',['id'=>$ebooks->id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
            <div class="form-group">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <img src="{{ URL::to('/images/'.$ebooks->image)}}" style="width:50px" alt="">
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Gambar</label>
    			<div class="col-lg-10">
    				<input type="file" class="form-control" name="image">
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" value="{{ $ebooks->title }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <select class="form-control" name="subjectscategories_id">
                            @foreach($subjectscategories as $value)
                                <option value="{{$value->id}}" {{collect(old('subjectscategory'))->contains($value->id) ? 'selected':''}} @if($value->id == $ebooks['subjectscategories_id']) selected='selected' @endif>{{$value->name}}</option>
                           @endforeach
                    </select>
                </div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <select class="form-control" name="class">

                           <option value="1" @if ($ebooks->class == '1') selected="selected" @endif>1</option>
                           <option value="2" @if ($ebooks->class == '2') selected="selected" @endif>2</option>
                           <option value="3" @if ($ebooks->class == '3') selected="selected" @endif>3</option>

                    </select>
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Semester</label>
                <div class="col-lg-10">
                <select name="semester" class="form-control" required>
                    <option value="I" @if ($ebooks->semester == 'I') selected="selected" @endif>I</option>
                    <option value="II" @if ($ebooks->semester == 'II') selected="selected" @endif>II</option>
                    <option value="Both" @if ($ebooks->semester == 'Both') selected="selected" @endif>Both</option>
                </select>
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Pengarang</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="author" value="{{ $ebooks->author }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Penerbit</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="publisher" value="{{ $ebooks->publisher }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Tahun</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="year" value="{{ $ebooks->year }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="url" value="{{ $ebooks->url }}">
    			</div>
    		</div>
    	</fieldset>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-12" style="text-align: center;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/admin/e-book';">Batal</button>
          </div>
        </div>
    </form>

</div>


</div>

@endsection
