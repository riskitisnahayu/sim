@extends('student_layouts.master')

@section('student-content')
<form class="form-horizontal" action="{{ url('siswa/soal') }}"  method="get">
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
		<div class="container">
			<div class="row animate-box" style="background-color: white">
				<div class="col-md-12 text-center fh5co-heading">
					<h2>Bank Soal</h2>
					<div class="container">
						<div class="row" style="padding-right:50px">
							<div class="form-group">
				    			<label class="control-label col-lg-2">Kelas</label>
				    			<div class="col-lg-10">
				                    <select class="form-control" name="class" id="class" onchange="checkform()">
										{{-- <option value="">--- Pilih kelas ---</option>
										@foreach ($task_masters as $value)
											<option class="{{$value->subjectscategories_id}}" value="{{$value->id}}" {{collect(old('class'))->contains($value->id) ? 'selected':''}}>{{ $value->class }}</option>
										@endforeach --}}
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
								<label class="control-label col-lg-2">Semester</label>
								<div class="col-lg-10">
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
									{{-- <select class="form-control" id="title" name="title" onchange="checkform()">
										<option value="">--- Pilih judul soal ---</option>
										@foreach ($task_masters as $value)
											<option class="{{$value->subjectscategories_id}}" value="{{$value->id}}" {{collect(old('title'))->contains($value->id) ? 'selected':''}}>{{ $value->title }}</option>
										@endforeach
									</select> --}}
									<select class="form-control" name="title">
										<option  selected disabled>
											@if($errors->any())
												@if ($errors)

												@endif
												{{ old('title') }}
											@else
												---- Pilih Judul ---
											@endif
										</option>
											@foreach($task_masters as $value)
												<option value="{{$value->id}}" {{collect(old('title'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
				    			<label class="control-label col-lg-2">Tipe Soal</label>
				    			<div class="col-lg-10">
									<input type="text" class="form-control" name="tipe" placeholder="Pilihan ganda" readonly>
				                    {{-- <select name="tipe" class="form-control" >
				                        <option  selected disabled>
				                            @if($errors->any())
				                                @if ($errors)

				                                @endif
				                                {{ old('tipe') }}
				                            @else
				                                --- Pilih Tipe Soal ---
				                            @endif
				                        </option>
				                        <option value="Pilihan ganda">Pilihan Ganda</option>
				                    </select> --}}
				    			</div>
				    		</div>
							<div class="form-group">
				    			<label class="control-label col-lg-2">Jenis Soal</label>
				    			<div class="col-lg-10">
									<input type="text" class="form-control" name="jenis" placeholder="Latihan" readonly>
				                    {{-- <select name="jenis" class="form-control" >
				                        <option  selected disabled>
				                            @if($errors->any())
				                                @if ($errors)

				                                @endif
				                                {{ old('jenis') }}
				                            @else
				                                --- Pilih Jenis Soal ---
				                            @endif
				                        </option>
				                        <option value="Latihan">Latihan</option>
										<option value="Ulangan harian">Ulangan harian</option>
				                    </select> --}}
				    			</div>
				    		</div>
							<div class="form-group">
								<label class="control-label col-lg-2">Jumlah Soal</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="total" placeholder="10" readonly>
									{{-- <select name="total" class="form-control" >
										<option  selected disabled>
											@if($errors->any())
												@if ($errors)

												@endif
												{{ old('total') }}
											@else
												--- 0 ---
											@endif
										</option>
										<option value="2">2</option>
										<option value="5">5</option>
										<option value="10">10</option>
									</select> --}}
								</div>
							</div>

							<div class="row" style="margin-top: 15px; margin-bottom:20px">
				            	<div class="col-md-12" style="text-align: center;">
									<input type="submit" class="btn btn-success" value="Buka soal">
				              	</div>
				            </div>
						</div>
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
	// $("#title").chained("#subjectscategories");
	// $("#class").chained("#title");

	</script>
@endsection
