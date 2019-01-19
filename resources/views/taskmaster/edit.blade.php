@extends('layouts.panel')

@section('page_title')
    Edit Bank Soal

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

    <form class="form-horizontal" action="{!! route('taskmaster.update',['id'=>$task_masters->id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" value="{{ $task_masters->title }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <select class="form-control" name="class">

                           <option value="7" @if ($task_masters->class == '7') selected="selected" @endif>7</option>
                           <option value="8" @if ($task_masters->class == '8') selected="selected" @endif>8</option>
                           <option value="9" @if ($task_masters->class == '9') selected="selected" @endif>9</option>
                    </select>
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Semester</label>
                <div class="col-lg-10">
                <select name="semester" class="form-control" required>
                    <option value="I" @if ($task_masters->semester == 'I') selected="selected" @endif>I</option>
                    <option value="II" @if ($task_masters->semester == 'II') selected="selected" @endif>II</option>
                    <option value="Both" @if ($task_masters->semester == 'Both') selected="selected" @endif>Both</option>
                </select>
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <select class="form-control" name="subjectscategories_id">
                            @foreach($subjectscategories as $value)
                                <option value="{{$value->id}}" {{collect(old('subjectscategory'))->contains($value->id) ? 'selected':''}} @if($value->id == $task_masters['subjectscategories_id']) selected='selected' @endif>{{$value->name}}</option>
                           @endforeach
                    </select>
                </div>
    		</div>

    	</fieldset>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-12" style="text-align: center;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/admin/bank-soal';">Batal</button>
          </div>
        </div>
    </form>

</div>


</div>

@endsection
