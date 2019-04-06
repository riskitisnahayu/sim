@extends('layouts.panel')

@section('page_title')
     Soal

@endsection

@section('content_section')
    <div class="panel panel-flat content-group-lg">
        <div class="panel-heading">

        </div>

        <table class="table datatable-html datatable-scroll-x" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Deskripsi Soal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $key => $task)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $task->description }}</td>
                        <td class="text-center" style="width:100px">
                            <button type="button" class="btn btn-warning btn-icon btn-rounded" onclick="location.href='{{url('admin/soal/edit/'.$task->id)}}'" title="Edit"><i class="icon-pencil"></i></button>
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
            autoWidth: true,
            // scrollX: 300,
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
