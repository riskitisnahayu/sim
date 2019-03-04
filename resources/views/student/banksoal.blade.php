@extends('student_layouts.master')

@section('student-content')
	<form class="form-horizontal" action="{!! route('student.banksoal') !!}" enctype="multipart/form-data" method="get">

	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Bank Soal</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="form-group">
					<label class="control-label col-lg-2">Mata Pelajaran</label>
					<div class="col-lg-10">
							<select class="form-control" name="subjectscategories" id="subjectscategories" onchange="checkform()">
								<option value="">--- Pilih Mata Pelajaran ---</option>
								@foreach ($subjectscategories as $key => $value)
									<option value="{{$value->id}}" {{collect(old('subjectscategories'))->contains($value->id) ? 'selected':''}}>{{ $value->name }}</option>
								@endforeach
							</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Judul</label>
					<div class="col-lg-10">
						{{-- <input type="text" class="form-control" placeholder="provinsi"> --}}
							<select class="form-control" id="title" name="title">
								<option value="">--- Pilih Judul Bank Soal ---</option>
								@foreach ($task_masters as $key => $value)
									<option value="{{$value->id}}" {{collect(old('title'))->contains($value->id) ? 'selected':''}}>{{ $value->title }}</option>
								@endforeach
							</select>
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
				<div class="row" style="margin-top: 15px; margin-bottom:20px">
	            	<div class="col-md-12" style="text-align: center;">
	                	<button type="submit" class="btn btn-success">Submit</button>
	              	</div>
	            </div>
			</div>
		</div>
	</div>
	</form>

@endsection

@section('script')
<script src="{{ asset('law/assets/js/jquery.chained.min.js') }}"></script>
	<script>
	$("#title").chained("#subjectscategories");
	</script>
@endsection
