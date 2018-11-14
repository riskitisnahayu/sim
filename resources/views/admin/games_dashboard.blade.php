@extends('layouts.panel')

@section('page_title')
    Daftar Game

@endsection

@section('content_section')
    {{-- <p>ini halaman daftar games</p> --}}
<div class="panel panel-flat content-group-lg">
    <div class="row"></div>
<table class="table datatable-html">
    <thead>
        <tr>
           <th>#</th>
           <th>Nama</th>
           <th>Level</th>
           <th>Foto</th>
           <th>Deskripsi</th>
           <th>Url</th>
       </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Tiger Nixon</td>
            <td>1</td>
            <td>tiger.png</td>
            <td>ini game tiger</td>
            <td>www.tiger.com</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Garrett Winters</td>
            <td>2</td>
            <td>garet.jpg</td>
            <td>ini game garet</td>
            <td>www.garet.com</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Junior Technical Author</td>
            <td>3</td>
            <td>junior.png</td>
            <td>ini game junior</td>
            <td>www.junior.com</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Senior Javascript Developer</td>
            <td>2</td>
            <td>senior.png</td>
            <td>ini game senior</td>
            <td>www.senior.com</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Accountant</td>
            <td>3</td>
            <td>accountant.png</td>
            <td>ini game accountant</td>
            <td>www.accountant.com</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Integration Specialist</td>
            <td>1</td>
            <td>int.png</td>
            <td>ini game int</td>
            <td>www.int.com</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Specialist</td>
            <td>1</td>
            <td>spe.png</td>
            <td>ini game spe</td>
            <td>www.spe.com</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Iration</td>
            <td>2</td>
            <td>ira.png</td>
            <td>ini game ira</td>
            <td>www.ira.com</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Cialist</td>
            <td>1</td>
            <td>cia.png</td>
            <td>ini game cia</td>
            <td>www.cia.com</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Gration</td>
            <td>1</td>
            <td>gra.png</td>
            <td>ini game gra</td>
            <td>www.gra.com</td>
        </tr>
        <tr>
            <td>11</td>
            <td>List</td>
            <td>2</td>
            <td>list.png</td>
            <td>ini game list</td>
            <td>www.list.com</td>
        </tr>
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
