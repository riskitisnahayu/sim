@extends('student_layouts.master')

@section('student-content')
	<form class="form-horizontal" action="{!! route('student.soal') !!}" enctype="multipart/form-data" method="get">

	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Soal</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">

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
