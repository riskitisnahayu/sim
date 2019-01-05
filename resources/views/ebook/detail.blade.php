@extends('layouts.panel')

@section('page_title')
    Detail E-Book

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
    <form class="form-horizontal"  enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
            <div class="form-group">
                <label class="control-label col-lg-2">Gambar</label>
                <div class="col-lg-10">
                    <img src="{{ url('images/'.$ebooks->image)}}" style="width:150px" alt="">
                </div>
            </div>
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" placeholder="{{ $ebooks->title }}" readonly="">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="subjectscategories_id" placeholder="{{ $ebooks->subjectscategory['name'] }}" readonly="" type="text">
                </div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <input type="text" class="form-control" name="class" placeholder="{{ $ebooks->class }}" readonly="" type="text">
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Semester</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="class" placeholder="{{ $ebooks->semester }}" readonly="" type="text">
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Pengarang</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="author" placeholder="{{ $ebooks->author }}" readonly="">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Penerbit</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="publisher" placeholder="{{ $ebooks->publisher }}" readonly="">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Tahun</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="year" placeholder="{{ $ebooks->year }}" readonly="">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="url" placeholder="{{ $ebooks->url }}" readonly="">
    			</div>
    		</div>
    	</fieldset>
        <div class="row mt-3">
            <div class="col-lg" style="text-align: center">
              <button type="button" class="btn btn-success" onclick="location.href='/admin/e-book';">Kembali</button>
            </div>
        </div>
    </form>

</div>


</div>

@endsection
