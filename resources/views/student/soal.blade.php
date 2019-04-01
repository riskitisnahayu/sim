@extends('student_layouts.master')

@section('student-content')

<form class="form-horizontal" name="soal" id="soal" action="{{ route('student.hasil') }}" enctype="multipart/form-data" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}">
	<input type="hidden" name="task_id" value="{{ $task_id }}">
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
	<div class="container">
		<div class="row animate-box" style="background-color: white">
			<div class="col-md-12 text-center fh5co-heading">
				<h2>Soal</h2>
					<div class="row" style="background-color: white; padding:25px">
						<div class="form-group text-center"  style="padding:15px">
							<label class="col-lg-12" style="font-size: 20px">Latihan Soal</label>
						</div>
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
									<td style="padding-left:50px">{{ Carbon\Carbon::now()->toFormattedDateString() }} {{ Carbon\Carbon::now()->format('H:i:s') }}</td>
								</tr>
								<tr>
									<td>Durasi waktu</td>
									<td style="padding-left:50px">:</td>
									<td>
										<!-- Todo : Ditengahke ben jos -->
										<div class="row" style="padding-left: 66px">
											<h4 id="demo" class=""></h4>
										</div>
									</td>
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
													<input type="radio" value="{{$choices[$key]}}" name="answer{{$loop->parent->index+1}}" class="styled"  id="rd{{$key+1}}">
													{{ $choices[$key].". ".$answer->choice_answer }}
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
@section('script')
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		var deadline = new Date("{{$endTime}}").getTime();
		var x = setInterval(function () {
			var now = new Date().getTime();
			var t = deadline - now;
			var days = Math.floor(t / (1000 * 60 * 60 * 24));
			var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((t % (1000 * 60)) / 1000);
			document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
			// document.getElementById("demo").innerHTML = days + "d " +
			// 	hours + "h " + minutes + "m " + seconds + "s ";
			if (t < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML = "EXPIRED";
				submitForm();
			}
		}, 1000);
	});

	function submitForm(){
		document.forms["soal"].submit();
	}

</script>
@endsection
