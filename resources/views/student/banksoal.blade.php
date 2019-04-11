@extends('student_layouts.master')

@section('student-content')
<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
	<div class="container">
		<div class="row animate-box" style="background-color: white">
			<div class="col-md-8 col-md-offset-2 text-center" style="padding-top:20px">
				<h2>Bank Soal</h2>
		</div>
		<form class="form-horizontal" action="{{ url('siswa/soal') }}"  method="get">
			<div class="form-group" style="padding-top:130px">
			<label class="control-label col-lg-3">Mata Pelajaran</label>
				<div class="col-lg-8">
					<select class="form-control" name="subjectscategories" id="subjectscategories" onchange="checkform()">
						<option value="">--- Pilih Mata Pelajaran ---</option>
						@foreach ($subjectscategories as $key => $value)
							<option value="{{$value->id}}" {{collect(old('subjectscategories'))->contains($value->id) ? 'selected':''}}>{{ $value->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
			<label class="control-label col-lg-3">Judul</label>
				<div class="col-lg-8">
					<select class="form-control" id="title" name="title" onchange="checkform()">
						<option value="">--- Pilih Judul Soal ---</option>
						@foreach ($task_masters as $value)
							<option class="{{$value->subjectscategories_id}}" value="{{$value->id}}" {{collect(old('title'))->contains($value->id) ? 'selected':''}}>{{ $value->title }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
			<label class="control-label col-lg-3">Kelas</label>
    			<div class="col-lg-8">
                    <select class="form-control" name="class" id="class">
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('class') }}
                            @else
                                --- Pilih Kelas ---
                            @endif
                        </option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
    			</div>
    		</div>
			<div class="form-group">
			<label class="control-label col-lg-3">Semester</label>
				<div class="col-lg-8">
					<select name="semester" class="form-control" >
						<option  selected disabled>
							@if($errors->any())
								@if ($errors)

								@endif
								{{ old('semester') }}
							@else
								--- Pilih Semester ---
							@endif
						</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="Both">Both</option>
					</select>
				</div>
			</div>
			<div class="form-group">
			<label class="control-label col-lg-3">Tipe Soal</label>
    			<div class="col-lg-8">
					<p style="padding-top:10px">Pilihan Ganda</p>
					{{-- <input type="text" class="form-control" name="tipe" placeholder="Pilihan Ganda" readonly> --}}
    			</div>
    		</div>
			<div class="form-group">
			<label class="control-label col-lg-3">Jenis Soal</label>
    			<div class="col-lg-8">
					<p style="padding-top:10px">Latihan</p>
					{{-- <input type="text" class="form-control" name="jenis" placeholder="Latihan" readonly> --}}
    				</div>
    			</div>
				<div class="form-group">
				<label class="control-label col-lg-3">Jumlah Soal</label>
					<div class="col-lg-8" valign:top>
						<p style="padding-top:10px">10</p>
						{{-- <input type="text" class="form-control" name="total" placeholder="10" readonly> --}}
					</div>
				</div>
				<div class="row" style="margin-top: 30px; margin-bottom:20px">
	            	<div class="col-md-12 text-center" style="padding-top:15px; padding-bottom: 10px">
						<button type="button" class="btn btn-default" onclick="location.href='/siswa'">Kembali</button>
						<input type="submit" class="btn btn-success" value="Buka soal">
	              	</div>
	            </div>
				@if (session('error'))
					<div class="container" style="margin-bottom:20px">
						<div class="col-md-12 text-center">
							<h4>{{ session('error') }}</h4>
						</div>
					</div>
				@endif
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
