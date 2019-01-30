@extends('layouts.panel')

@section('page_title')
    Laporan

@endsection

@section('content_section')
    {{-- <p>ini halaman daftar user</p> --}}
<div class="panel panel-flat content-group-lg">
<div class="row"></div>
    <table class="table datatable-html">
        <thead>
            <tr>
               <th>No</th>
               <th>Nama anak</th>
               <th>Kelas</th>
               <th>Fitur</th>
               <th>Tanggal</th>
               <th>Waktu</th>

           </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tiger Nixon</td>
                <td>8</td>
                <td>Mini games</td>
                <td>21 Januari 2019</td>
                <td>7.50 am</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tiger Nixon</td>
                <td>8</td>
                <td>Mini games</td>
                <td>21 Januari 2019</td>
                <td>7.50 am</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Tiger Nixon</td>
                <td>8</td>
                <td>Mini games</td>
                <td>21 Januari 2019</td>
                <td>7.50 am</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Tiger Nixon</td>
                <td>8</td>
                <td>Mini games</td>
                <td>21 Januari 2019</td>
                <td>7.50 am</td>
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
