@extends('layouts.panel')

@section('page_title')
    Tambah Bank Soal

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

    <form class="form-horizontal" action="{!! route('taskmaster.store') !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" >
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <select name="class" class="form-control" >
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('class') }}
                            @else
                                ---- Pilih Kelas ---
                            @endif
                        </option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Semester</label>
                <div class="col-lg-10">
                <select name="semester" class="form-control" >
                    <option  selected disabled>
                        @if($errors->any())
                            @if ($errors)

                            @endif
                            {{ old('semester') }}
                        @else
                            ---- Pilih Semester ---
                        @endif
                    </option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="Both">Both</option>
                </select>
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata Pelajaran</label>
                <div class="col-lg-10">
                    <select class="form-control" name="subjectscategories_id">
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('subjectscategories_id') }}
                            @else
                                ---- Pilih Mata Pelajaran ---
                            @endif
                        </option>
                            @foreach($subjectscategories as $value)
                                <option value="{{$value->id}}" {{collect(old('subjectscategories'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
                            @endforeach
                    </select>
                </div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Jumlah Soal</label>
                <div class="col-lg-10">
    				{{-- <input type="text" class="form-control" name="name" placeholder="10" readonly="" type="text"> --}}
                <select name="total_task" class="form-control" >
                    <option  selected disabled>
                        @if($errors->any())
                            @if ($errors)

                            @endif
                            {{ old('total_task') }}
                        @else
                            0
                        @endif
                    </option>
                    {{-- <option value="2">2</option>
                    <option value="5">5</option> --}}
                    <option value="10">10</option>
                </select>
                </div>
            </div>
            <div class="form-group">
				<label class="control-label col-lg-2">Set waktu</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-watch2"></i></span>
					<input type="text" class="form-control" name="timeout" placeholder="Tuliskan waktu..">
                    <span class="input-group-addon">menit</span>
				</div>
			</div>
    	</fieldset>

        <div class="row" style="margin-top: 10px;">
          <div class="col-md-12" style="text-align: center;">
            <button type="submit" class="btn btn-success">Buat Soal</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/admin/bank-soal';">Batal</button>
          </div>
        </div>
    </form>

</div>


</div>
@endsection
