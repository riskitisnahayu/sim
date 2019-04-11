@extends('layouts.panel')

@section('page_title')
    Edit Mata Pelajaran

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" action="{!! route('subjectscategory.update',['id'=>$subjectscategories->id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		<div class="form-group">
    			<label class="control-label col-lg-2">Nama mata pelajaran</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="name" placeholder="Nama mata pelajaran" value="{{ $subjectscategories->name }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Deskripsi</label>
    			<div class="col-lg-10">
    				<textarea rows="5"  name="description" cols="5" class="form-control" placeholder="Tulis deskripsi.." value="">{{ $subjectscategories->description }}</textarea>
    			</div>
    		</div>
    	</fieldset>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12" style="text-align: center;">
                <button type="button" class="btn btn-danger" onclick="location.href='/admin/kelola-mata-pelajaran';">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
