@extends('layouts.panel')

@section('content')
@section('page_title')
    Laporan Hasil Tes Anak

@endsection

@section('content_section')
<div class="panel panel-flat content-group-lg">
<div class="row"></div>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No</th>
               <th>Nama anak</th>
               <th>Kelas</th>
               <th>Mata pelajaran</th>
               <th>Judul</th>
               <th>Nilai</th>
               <th>Tanggal</th>
               <th>Waktu</th>
           </tr>
        </thead>
        <tbody>
            {{-- @foreach ($user->studenttask as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->user->name }}</td>
                    <td>{{ $user->class }}</td>
                    <td>{{ $value->taskMaster->subjectscategory->name}}</td>
                    <td>{{ $value->taskMaster->title }}</td>
                    <td>{{ $value->score}}</td>
                    <td>{{ Carbon\Carbon::parse($activity->created_at)->toFormattedDateString() }}</td>
                    <td>{{ Carbon\Carbon::parse($activity->created_at)->format('H:i:s') }}</td>
                </tr>
            @endforeach --}}

            @foreach ($studenttask as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ 'App\Student'::where('id',$value->student_id)->get()->first()->user()->get()->first()->name}}</td>
                    <td>{{ 'App\Student'::where('id',$value->student_id)->get()->first()->class}}</td>
                    <td>{{ $value->taskMaster->subjectscategory->name}}</td>
                    <td>{{ $value->taskMaster->title }}</td>
                    <td>{{ $value->score}},00 dari 100,00</td>
                    <td>{{ Carbon\Carbon::parse($value->created_at)->toFormattedDateString() }}</td>
                    <td>{{ Carbon\Carbon::parse($value->created_at)->format('H:i:s') }}</td>
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
                order: [[ 7, "desc" ]],
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
