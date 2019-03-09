@extends('layouts.panel')

@section('page_title')
    Registrasi Anak

@endsection

@section('content_section')

<div class="panel panel-flat content-group-lg">
	<div class="panel-heading"></div>
    <div class="row">
        <div class="col-sm-4 col-md-2">
            <button type="button" class="btn btn-primary" style="margin-left:20px" onclick="location.href='{{url('orangtua/registerasi-anak/add')}}'"><i class="icon-plus2 position-left"></i> Tambah Akun Anak</button>
        </div>
    </div>

    <br>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No.</th>
               <th>Nama anak</th>
               <th>Jenis kelamin</th>
               <th>Asal sekolah</th>
               <th>Kelas</th>
               <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->user['name'] }}</td>
                    <td>{{ $value->jenis_kelamin }}</td>
                    <td>{{ $value->school_name }}</td>
                    <td>{{ $value->class }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-icon btn-rounded" onclick="location.href='{{url('orangtua/registerasi-anak/detail/'.$value->id) }}'" title="Detail"><i class="icon-info3"></i></button>
                        <button type="button" class="btn btn-warning btn-icon btn-rounded" onclick="location.href='{{url('orangtua/registerasi-anak/edit/'.$value->id) }}'" title="Edit"><i class="icon-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-icon btn-rounded" onclick="javascript:if(confirm('Yakin ingin hapus data?')){window.location.href='{{url('orangtua/registerasi-anak/delete/'.$value->id) }}'};" title="Delete"><i class="icon-trash"></i></button>
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
