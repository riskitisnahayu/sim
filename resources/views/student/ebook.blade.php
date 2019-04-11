@extends('student_layouts.master')

@section('student-content')
<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
	{{-- <div class="container">
		<div class="row animate-box" style="background-color: white">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>E-Book</h2>
			</div>
		</div>
	</div> --}}
	<div class="container">
		<div class="row animate-box"style="background-color: white">
			{{-- <div class="col-md-8 col-md-offset-2 text-center fh5co-heading" > --}}
			<div class="col-md-8 col-md-offset-2 text-center" style="padding-top:20px">
				<h2>E-Book</h2>
			</div>
		<form class="form-horizontal" action="{!! route('student.ebook') !!}" enctype="multipart/form-data" method="get">
			<div class="form-group" style="padding-top:130px">
    			<label class="control-label col-lg-3">Mata Pelajaran</label>
                <div class="col-lg-8">
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
    			<label class="control-label col-lg-3">Kelas</label>
    			<div class="col-lg-8">
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
				<label class="control-label col-lg-3">Semester</label>
				<div class="col-lg-8">
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
			<div class="row" style="margin-top: 30px">
            	{{-- <div class="col-md-12 text-center">
                	<button type="submit" class="btn btn-success">Submit</button>
              	</div> --}}
				<div class="col-md-12 text-center animate-box" style="padding-top:20px">
					<button type="button" class="btn btn-default" onclick="location.href='/siswa'">Kembali</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
            </div>
		</form>
			<div class="col-sm-12" style="display: flex;flex-basis: 100%;flex-wrap: wrap; margin-top:50px">
				{{-- dikasih isNotEmpty karena collection. klo variabel biasa bisa langsung if(nama variabel) --}}
				@if ($ebooks->isNotEmpty())
					@foreach ($ebooks as $key => $ebook)
						{{-- <div style="width:30%"> --}}
						<div class="col-sm-4">
							<div class="thumbnail">
								<div class="thumb text-center" style="padding-top:10px">
									<img src="{!! asset('images') !!}/{{ $ebook->image }}" alt="">
								</div>
								<div class="caption">
									<h4 class="no-margin-top text-center"><a href="{{ $ebook->url }}" target="_blank">{{ $ebook->title }}</a></h4>
								</div>
							</div>
						</div>
					@endforeach
					@else
						<div class="container" style="margin-bottom:20px">
			            	<div class="col-md-12 text-center">
								<h4>Maaf, Buku tidak tersedia.</h4>
			              	</div>
			            </div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
