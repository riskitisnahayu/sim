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
               <th>No</th>
               <th>Nama</th>
               <th>Kelas</th>
               <th>Game</th>
               <th>Kategori</th>
           </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tiger Nixon</td>
                <td>2</td>
                <td>Asteroid Garden</td>
                <td>Arcade</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Garrett Winters</td>
                <td>1</td>
                <td>Lap Track</td>
                <td>Racing</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Junior Reyhan</td>
                <td>3</td>
                <td>Burger Stack</td>
                <td>Puzzle</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Yohan Adi</td>
                <td>2</td>
                <td>oHamster</td>
                <td>Arcade</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Hafidz Pratama</td>
                <td>1</td>
                <td>Snake</td>
                <td>Classic</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Muhammad Naufal</td>
                <td>2</td>
                <td>Chicken Dodge</td>
                <td>Platform</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Riski Tisnahayu</td>
                <td>1</td>
                <td>Small Football</td>
                <td>Shooter</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Iration</td>
                <td>2</td>
                <td>Lap Track</td>
                <td>Racing</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Cialist</td>
                <td>3</td>
                <td>Small Football</td>
                <td>Shooter</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Gration</td>
                <td>1</td>
                <td>Chicken Dodge</td>
                <td>Platform</td>
            </tr>
            <tr>
                <td>11</td>
                <td>List</td>
                <td>1</td>
                <td>Dagger Master</td>
                <td>Arcade</td>
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
