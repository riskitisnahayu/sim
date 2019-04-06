@extends('layouts.panel')


@section('content')
@section('page_title')
    Dashboard

@endsection

@section('content_section')
<!-- Quick stats boxes -->
<div class="row">
	<div class="col-lg-4">
		<!-- Members online -->
		<div class="panel bg-teal-400">
			<div class="panel-body">
				<h1 class="no-margin">{{ $ortu }}</h1>
				Orangtua
			</div>
			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
		<!-- /members online -->
	</div>

	<div class="col-lg-4">
		<!-- Current server load -->
		<div class="panel bg-pink-400">
			<div class="panel-body">
				<h1 class="no-margin">{{ $siswa }}</h1>
				Siswa
			</div>
			<div id="server-load"></div>
		</div>
		<!-- /current server load -->
	</div>

	<div class="col-lg-4">
		<!-- Today's revenue -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<h1 class="no-margin">3</h1>
				Fitur
			</div>
			<div id="today-revenue"></div>
		</div>
		<!-- /today's revenue -->
	</div>
</div>
<!-- /quick stats boxes -->

<div class="panel panel-flat content-group-lg">
    <div class="panel-heading">
        <h6 class="panel-title">Laporan aktivitas siswa</h6>
    </div>
<div class="row"></div>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No</th>
               <th>Nama orang tua</th>
               <th>Nama anak</th>
               <th>Kelas</th>
               <th>Fitur</th>
               <th>Tanggal</th>
               <th>Waktu</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($activities as $key => $activity)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $activity->user->student->orangtua->user->name }}</td>
                    <td>{{ $activity->user->student->user->name }}</td>
                    <td>{{ $activity->user->student->class }}</td>
                    <td>{{ $activity->fitur }}</td>
                    <td>{{ Carbon\Carbon::parse($activity->created_at)->toFormattedDateString() }}</td>
                    <td>{{ Carbon\Carbon::parse($activity->created_at)->format('H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datatable-html').dataTable({
                autoWidth: true,
                // scrollX:200,
                columnDefs: [{
                    orderable: false,
                    width: '100px',
                    targets: [ 0 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                drawCallback: function () {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
            });

            // Add placeholder to the datatable filter option
            $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


            // Enable Select2 select for the length option
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity,
                width: 'auto'
            });
        });
    </script>
@endsection
