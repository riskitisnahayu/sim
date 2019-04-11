@extends('layouts.panel')

@section('page_title')
    Dashboard

@endsection

@section('content_section')
<!-- Latest posts -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title">Berita terkini</h6>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<ul class="media-list content-group">
				@if($response)
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
				@else
					<span class="header">Tidak terhubung internet.</span>	
				@endif
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /latest posts -->
@endsection
