@extends('layouts.panel')

@section('page_title')
    E-Book

@endsection

@section('content_section')

<div class="panel panel-flat content-group-lg">
	<div class="panel-heading">

	</div>
    <div class="row">
        <div class="col-sm-4 col-md-2">
            <button type="button" class="btn btn-primary" style="margin-left:20px" onclick="location.href='{{url('admin/e-book/tambah')}}'"><i class="icon-plus2 position-left"></i> Tambah E-Book</button>
        </div>
    </div>

    <br>
    <table class="table datatable-html datatable-scroll-x" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Url</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{ URL::to('/images/'.$value->image)}}" style="width:50px" alt="">
                    </td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->subjectscategory['name'] }}</td>
                    <td>{{ $value->class }}</td>
                    <td>{{ $value->semester }}</td>
                    <td>{{ $value->author }}</td>
                    <td>{{ $value->publisher }}</td>
                    <td>{{ $value->year }}</td>
                    <td>
                        <a href="{{ $value->url }}">{{ $value->url }}</a>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-icon btn-rounded" onclick="location.href='{{url('admin/e-book/detail/'.$value->id) }}'" title="Detail"><i class="icon-info3"></i></button>
                        <button type="button" class="btn btn-warning btn-icon btn-rounded" onclick="location.href='{{url('admin/e-book/edit/'.$value->id) }}'" title="Edit"><i class="icon-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-icon btn-rounded" onclick="javascript:if(confirm('Yakin ingin hapus data?')){window.location.href='{{url('admin/e-book/delete/'.$value->id) }}'};" title="Delete"><i class="icon-trash"></i></button>
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
            scrollX: 300,
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
