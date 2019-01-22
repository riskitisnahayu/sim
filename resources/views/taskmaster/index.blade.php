@extends('layouts.panel')

@section('page_title')
    Bank Soal

@endsection

@section('content_section')

<div class="panel panel-flat content-group-lg">
	<div class="panel-heading">

	</div>
    <div class="row">
        <div class="col-sm-4 col-md-2">
            {{-- <button class="btn btn-primary btn-block mg-b-10"  style="margin-left:20px; padding:5px" onclick="location.href='{{url('banksoal/add')}}'"><i class="fa fa-plus mg-r-10"></i> Tambah Bank Soal</button> --}}
            <button type="button" class="btn btn-primary" style="margin-left:20px" onclick="location.href='{{url('banksoal/add')}}'"><i class="icon-plus2 position-left"></i> Tambah Bank Soal</button>

        </div>
    </div>

    <br>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No.</th>
               <th>Judul</th>
               <th>Kelas</th>
               <th>Semester</th>
               <th>Mata Pelajaran</th>
               <th class="text-center" style="width:160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task_masters as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->class }}</td>
                    <td>{{ $value->semester }}</td>
                    <td>{{ $value->subjectscategory['name'] }}</td>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-icon btn-rounded" onclick="location.href='{{url('banksoal/detail/'.$value->id) }}'" title="Detail"><i class="icon-info3"></i></button>
                        <button type="button" class="btn btn-warning btn-icon btn-rounded" onclick="location.href='{{url('banksoal/edit/'.$value->id) }}'" title="Edit"><i class="icon-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-icon btn-rounded" onclick="javascript:if(confirm('Yakin ingin hapus data?')){window.location.href='{{url('banksoal/delete/'.$value->id) }}'};" title="Delete"><i class="icon-trash"></i></button>

                        {{-- <a href="{{ url('banksoal/detail/'.$value->id) }}" class="btn btn-info btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Detail">
                            <i class="fa fa-info" style="font-size:0.9em"></i>
                        </a>
                        <a href="{!! route('taskmaster.edit', ['id'=>$value->id]) !!}" class="btn btn-warning btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Edit">
                            <i class="fa fa-pencil" style="font-size:0.9em"></i>
                        </a>
                        <a href="{!! route('taskmaster.delete', ['id'=>$value->id]) !!}" class="btn btn-danger btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Delete">
                            <i class="fa fa-trash" style="font-size:0.9em"></i>
                        </a> --}}
                    </td>
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
            autoWidth: false,
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
