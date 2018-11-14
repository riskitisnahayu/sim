@extends('layouts.panel')

@section('page_title')
    Daftar Pemain

@endsection

@section('content_section')
    {{-- <p>ini halaman daftar user</p> --}}
<div class="panel panel-flat content-group-lg">
<div class="row"></div>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>#</th>
               <th>Nama</th>
               <th>Level</th>
           </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tiger Nixon</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Garrett Winters</td>
                <td>2</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Junior Technical Author</td>
                <td>3</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Senior Javascript Developer</td>
                <td>2</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Accountant</td>
                <td>3</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Integration Specialist</td>
                <td>1</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Specialist</td>
                <td>1</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Iration</td>
                <td>2</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Cialist</td>
                <td>1</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Gration</td>
                <td>1</td>
            </tr>
            <tr>
                <td>11</td>
                <td>List</td>
                <td>2</td>
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
