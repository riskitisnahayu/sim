@extends('student_layouts.master')

@section('student-content')
<form class="form-horizontal" action="{!! route('student.hasil') !!}" enctype="multipart/form-data" method="get">
	{{ csrf_field() }}
	{{-- <input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}"> --}}
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
										<td>Jumlah Soal</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $studentTask->taskMaster['total_task'] }}</td>
									</tr>
									<tr>
										<td>Jawaban Benar</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $studentTask->true_answer }}</td>
									</tr>
									<tr>
										<td>Jawaban Salah</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $studentTask->wrong_answer }}</td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px">{{ $studentTask->score }},00 dari 100,00</td>
									</tr>
								</thead>
							</table>
							<hr>
							<table>
								<tbody>
									@foreach ($tasks as $key => $task)
										<tr style="text-align:left">
											<td>Pertanyaan</td>
											<td style="padding-left:50px">:</td>
											<td style="padding-left:20px">{{ $task->description }}</td>
										</tr>
										<tr style="text-align:left">
											<td>Jawaban</td>
											<td style="padding-left:50px">:</td>
											<td style="padding-left:20px">{{ $studentanswer[$key]->answer }}</td>
										</tr>
										<tr style="text-align:left">
											<td>Kunci</td>
											<td style="padding-left:50px">:</td>
											<td style="padding-left:20px;color:red">{{ $task->choice }}</td>
											<td></td>
										</tr>
										<tr style="text-align:left">
											<td>Pembahasan</td>
											<td style="padding-left:50px">:</td>
											<td style="padding-left:20px">{{ $task->discussion }}</td>
										</tr>

										<tr style="height: 24px">
										</tr>
									@endforeach
								</tbody>
							</table>
							<div class="row" style="margin-top: 15px; margin-bottom:20px">
								<div class="col-md-12 " style="text-align: center;">
									<button type="button" class="btn btn-success" onclick="location.href='/siswa';">OKE</button>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
