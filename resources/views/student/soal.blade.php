@extends('student_layouts.master')

@section('student-content')
<form class="form-horizontal" action="{!! route('student.soal',['id'=>$taskmaster_id]) !!}" enctype="multipart/form-data" method="get">
	{{ csrf_field() }}
	<input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}">
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
		<div class="container">
			<div class="row animate-box" style="background-color: white">
				<div class="col-md-12 text-center fh5co-heading">
					<h2>Soal</h2>
						<div class="row" style="background-color: white; padding:25px">
							<div class="form-group text-center"  style="padding:15px">
								<label class="col-lg-12">Latihan Soal</label>
							</div>
							{{-- <div class="form-group" style="text-align:left">
								<label class="control-label col-lg-2">Mata pelajaran :</label>
								{{ $task_master->title }}
							</div>
							<div class="form-group" style="text-align:left">
								<label class="control-label col-lg-2">Kelas :</label>
								{{ $task_master->class }}
							</div>
							<div class="form-group" style="text-align:left">
								<label class="control-label col-lg-2">Tanggal :</label>
								{{ Carbon\Carbon::parse($task_master->created_at)->toFormattedDateString() }}
								{{ Carbon\Carbon::parse($task_master->created_at)->format('H:i:s') }}
							</div> --}}
							<table style="text-align:left">
								<thead>
									<tr>
										<td>Mata Pelajaran</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $task_master->title }}</td>
									</tr>
									<tr>
										<td>Kelas</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $task_master->class }}</td>
									</tr>
									<tr>
										<td>Tanggal</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ Carbon\Carbon::parse($task_master->created_at)->toFormattedDateString() }} {{ Carbon\Carbon::parse($task_master->created_at)->format('H:i:s') }}</td>
									</tr>

								</thead>
							</table>
							<hr>
							<table>
								<tbody>
									@foreach ($tasks as $key => $task)
										<tr>
											<td colspan="4" style="text-align:left;width:800px">{{ $key+1 .". ".$task->description }}</td>
										</tr>
										<tr>
											@foreach ($answers[$key] as $key => $answer)
												<td style="text-align: left; padding-left:15px">
													<label class="radio-inline">
														<input type="radio" value="1" name="" class="styled">
														{{ $choices[$key]." ".$answer->choice_answer }}
													</label>
													<br>
													<br>
													<br>
												</td>
											@endforeach
										</tr>
									@endforeach
								</tbody>
							</table>
							<div class="row" style="margin-top: 15px; margin-bottom:20px">
								<div class="col-md-12 " style="text-align: center;">
									<button type="submit" class="btn btn-success">Selesai</button>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
