@extends('student_layouts.master')

@section('student-content')

<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
	{{-- <div class="container">
		<div class="row animate-box" style="background-color: white">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Mini Games</h2>
			</div>
		</div>
	</div> --}}
	<div class="container">
		<div class="row animate-box" style="background-color: white">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Mini Games</h2>
			</div>
			<form class="form-horizontal" action="{!! route('student.games') !!}" enctype="multipart/form-data" method="get">
			<div class="form-group">
				<label class="control-label col-sm-3">Kategori</label>
				<div class="col-lg-8">
					<select class="form-control" name="gamecategories_id">
						<option  selected disabled>
							@if($errors->any())
								@if ($errors)

								@endif
								{{ old('gamecategories_id') }}
							@else
								---- Pilih Kategori ---
							@endif
						</option>
							@foreach($gamecategories as $value)
								<option value="{{$value->id}}" {{collect(old('gamecategories'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
							@endforeach
					</select>
				</div>
			</div>
			<div class="row" style="margin-top: 30px; margin-bottom:20px">
				<div class="col-md-12 text-center">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
            </div>
			</form>

			<div class="col-sm-12" style="display: flex;flex-basis: 100%;flex-wrap: wrap; margin-top:50px">
				@foreach ($games as $key => $game)
					<div class="col-sm-4">
						<div class="thumbnail">
							<div class="thumb text-center" style="padding-top:10px">
								<img class="img-thumbnail" src="{!! asset('images') !!}/{{ $game->image }}" alt="">
							</div>

							<div class="caption">
								<h4 class="no-margin-top text-center"><a href="{{ $game->url }}" target="_blank">{{ $game->name }}</a></h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
{{-- <div class="container"> --}}
	{{-- <div style=" display: flex;flex-basis: 100%;flex-wrap: wrap;">
		@foreach ($games as $key => $game)
			<div style="width:30%">
				<div class="thumbnail">
					<div class="thumb">
						<img src="{!! asset('images') !!}/{{ $game->image }}" alt="">
					</div>

					<div class="caption">
						<h4 class="no-margin-top text-center"><a href="{{ $game->url }}" target="_blank">{{ $game->name }}</a></h4>
					</div>
				</div>
			</div>
		@endforeach
	</div> --}}
{{-- </div> --}}

@endsection
