@extends('layouts.panel')


@section('content')
    @section('page_title')
        Dashboard

    @endsection

    @section('content_section')
        <!-- <p>ini halaman dashboard</p> -->

    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Daftar Game</h6>
                </div>

                <div class="panel-body">
                    <!-- <p>By default, Bootstrap's thumbnails are designed to showcase linked images with minimal required markup.</p> -->
                    <div class="thumbnail">
                        <a href="games-dashboard" data-popup="lightbox">
                            <img src="/assets/images/dashboard/game_list.jpg" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Daftar Pemain</h6>
                </div>

                <div class="panel-body">
                    <!-- <p>By default, Bootstrap's thumbnails are designed to showcase linked images with minimal required markup.</p> -->

                    <div class="thumbnail">
                        <a href="user-dashboard" data-popup="lightbox">
                            <img src="/assets/images/dashboard/user_list.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection

@endsection
