@extends('layouts.panel')

@section('page_title')
    Mini Games

@endsection

@section('content_section')

<div class="panel panel-flat content-group-lg">
	<div class="panel-heading">
		{{-- <h5>Tambah Mini Games</h5> --}}

	</div>
    <div class="row">
        <div class="col-sm-4 col-md-2">
            <button class="btn btn-primary btn-block mg-b-10"  style="margin-left:20px; padding:5px" onclick="location.href='{{url('admin/games/add')}}'"><i class="fa fa-plus mg-r-10"></i> Tambah Mini Games</button>
        </div>
    </div>

    <br>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No.</th>
               <th>Gambar</th>
               <th>Nama</th>
               <th>Kategori</th>
               <th>Deskripsi</th>
               <th>Url</th>
               <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{ URL::to('/images/'.$value->image)}}" style="width:50px" alt="">
                    </td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->gamecategory['name'] }}</td>

                    <td>{{ $value->description }}</td>
                    <td>
                        <a href="{{ $value->url }}">{{ $value->url }}</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ url('admin/games/detail/'.$value->id) }}" class="btn btn-info btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Detail">
                            <i class="fa fa-info" style="font-size:0.9em"></i>
                        </a>
                        <a href="{!! route('admin.games.edit', ['id'=>$value->id]) !!}" class="btn btn-warning btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Edit">
                            <i class="fa fa-pencil" style="font-size:0.9em"></i>
                        </a>
                        <a href="{!! route('admin.games.delete', ['id'=>$value->id]) !!}" class="btn btn-danger btn-icon rounded-circle mg-r-5 mg-b-10" style="border-radius: 50%; width: 33px" title="Delete">
                            <i class="fa fa-trash" style="font-size:0.9em"></i>
                        </a>
                    </td>

                    {{-- <td>
                        <td>
                            <a href="{{ url('admin/games/detail/'.$value->id) }}" class="btn btn-info" title="Detail">Detail</a>
                        </td>

                        <td>
                            <a href="{!! route('admin.games.edit', ['id'=>$value->id]) !!}" class="btn btn-warning" title="Edit">Edit</a>
                        </td>
                        <td>
                            <form action="{!! url('admin/games/delete/'.$value->id) !!}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>


	{{-- <div class="table-responsive" > --}}
        <!-- style="min-height: 44vh" -->
        {{-- <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Game</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table> --}}
		<!-- <p>Primary color palette includes 6 colors: 1 main color without suffix and 5 accent colors with 300, 400, 600, 700 and 800 suffixes. Majority of components and layout parts are coded with maximum flexibility and support of different color options that can be changed on-the-fly just by adding or replacing proper color class. Also works perfectly in combination with other helpers, that makes Limitless very flexible and configurable.</p> -->
		<!-- <strong>Please note:</strong> default Bootstrap contextual classes - primary, danger, success, warning, info - still available and correspond to main colors, so you can use both <code>.bg-danger</code> and <code>.btn-danger</code> as main colors, but if you want to use accent colors, use only <code>.bg-*-*</code>, BS accent classes have been dropped to avoid unnecessary dublicating. -->
	{{-- </div> --}}
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
