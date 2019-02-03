@extends('layouts.panel')

@section('page_title')
    Dashboard

@endsection

@section('content_section')
<!-- Latest posts -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title">Berita terkini</h6>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<ul class="media-list content-group">
                    @foreach ($response['articles'] as $key => $article)
                        <li class="media stack-media-on-mobile">
        					<div class="media-left">
    							<div class="thumb">
    								<a href="{{ $article['url'] }}" target="_blank">
    									<img src="{{ $article['urlToImage'] }}" class="img-responsive img-rounded media-preview" alt="">
    									<span class="zoom-image"><i class="icon-play3"></i></span>
    								</a>
    							</div>
    						</div>

        					<div class="media-body">
    							<h6 class="media-heading"><a href="{{ $article['url'] }}" target="_blank">{{ $article['title'] }}</a></h6>
                        		<ul class="list-inline list-inline-separate text-muted mb-5">
                        			<li><i class="icon-book-play position-left"></i> {{ $article['author'] }}</li>
                        			<li>{{ Carbon\Carbon::parse($article['publishedAt'])->diffForHumans() }}</li>
                        		</ul>
    							{{ $article['description'] }}
    						</div>
    					</li>
                    @endforeach
				</ul>
			</div>

			{{-- <div class="col-lg-6">
				<ul class="media-list content-group">
					<li class="media stack-media-on-mobile">
    					<div class="media-left">
							<div class="thumb">
								<a href="#">
									<img src="{!! asset('panel/assets/images/placeholder.jpg') !!}" class="img-responsive img-rounded media-preview" alt="">
									<span class="zoom-image"><i class="icon-play3"></i></span>
								</a>
							</div>
						</div>

    					<div class="media-body">
							<h6 class="media-heading"><a href="#">Case read they must</a></h6>
                    		<ul class="list-inline list-inline-separate text-muted mb-5">
                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
                    			<li>20 hours ago</li>
                    		</ul>
							On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
						</div>
					</li>

					<li class="media stack-media-on-mobile">
    					<div class="media-left">
							<div class="thumb">
								<a href="#">
									<img src="{!! asset('panel/assets/images/placeholder.jpg') !!}" class="img-responsive img-rounded media-preview" alt="">
									<span class="zoom-image"><i class="icon-play3"></i></span>
								</a>
							</div>
						</div>

    					<div class="media-body">
							<h6 class="media-heading"><a href="#">Too carriage attended</a></h6>
                    		<ul class="list-inline list-inline-separate text-muted mb-5">
                    			<li><i class="icon-book-play position-left"></i> FAQ section</li>
                    			<li>2 days ago</li>
                    		</ul>
							Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
						</div>
					</li>
				</ul>
			</div> --}}
		</div>
	</div>
</div>
<!-- /latest posts -->
@endsection
