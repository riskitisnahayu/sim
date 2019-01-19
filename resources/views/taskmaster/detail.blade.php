@extends('layouts.panel')

@section('page_title')
    Detail Bank Soal

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">
    <form class="form-horizontal"  enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" placeholder="{{ $task_masters->title }}" readonly="">
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Kelas</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="class" placeholder="{{ $task_masters->class }}" readonly="" type="text">
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="subjectscategories_id" placeholder="{{ $task_masters->subjectscategory['name'] }}" readonly="" type="text">
                </div>
    		</div>
    	</fieldset>
        <div class="row mt-3">
            <div class="col-lg" style="text-align: center">
              <button type="button" class="btn btn-success" onclick="location.href='/admin/bank-soal';">Kembali</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
