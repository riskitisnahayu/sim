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
										<td>Jumlah Soal</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px"></td>
									</tr>
									<tr>
										<td>Jawaban Benar</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px"></td>
									</tr>
									<tr>
										<td>Jawaban Salah</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td style="padding-left:50px">:</td>
										<td style="padding-left:50px"></td>
									</tr>
								</thead>
							</table>
							<hr>
							<table>
								<tbody>
										<tr>
											<td>Pertanyaan</td>
											<td>:</td>
										</tr>
										<tr>
											<td>Jawaban</td>
											<td>:</td>
										</tr>
										<tr>
											<td>Kunci</td>
											<td>:</td>
										</tr>
										<tr>
											<td>Pembahasan</td>
											<td>:</td>
										</tr>
								</tbody>
							</table>
							<div class="row" style="margin-top: 15px; margin-bottom:20px">
								<div class="col-md-12 " style="text-align: center;">
									{{-- <button type="submit" class="btn btn-success">Selesai</button> --}}
									<button type="button" class="btn btn-success" onclick="location.href='/siswa/soal';">OKE</button>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
