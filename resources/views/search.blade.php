@extends('layouts.app')
@section('content')
<div class="tr-job-posted section-padding">
    <div class="container">
		<div class="job-tab text-center">
			<ul class="nav nav-tabs justify-content-center" role="tablist">
				<li role="presentation" class="active">
					<a class="active show" href="#albumstab" aria-controls="albumstab" role="tab" data-toggle="tab" aria-selected="true">Album Results</a>
				</li>
				<li role="presentation"><a href="#artiststab" aria-controls="artiststab" role="tab" data-toggle="tab" class="" aria-selected="false">Artists Results</a></li>
			</ul>
			<div class="tab-content text-left">
				<div role="tabpanel" class="tab-pane fade active show" id="albumstab">
					<div class="row">
                        @if ($albums > 0)
                            @foreach ($albums as $album)
                            <div class="col-md-6 col-lg-6">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                      <div class="col-md-4">
                                        @foreach ($album->image as $image)
                                        <img src="{{ $image->size }}" class="card-img" alt="...">
                                        @break
                                        @endforeach
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">{{ $album->name }}</h5>
                                          <p class="card-text">{{ $album->artist }}</p>
                                          <p class="card-text"><small class="text-muted">
                                            <a href="{{ route('showalbum', ['artist' =>$album->artist, 'album' =>$album->name]) }}" >
                                                VIEW </a>
                                        </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            @endforeach
                        @else
                            <p>Nothing to show
                        @endif
						
						
					</div><!-- /.row -->
				</div><!-- /.tab-pane -->
				<div role="tabpanel" class="tab-pane fade in" id="artiststab">
					<div class="row">
                        @if ($artists > 0)
                            @foreach ($artists as $artist)
                            <div class="col-md-6 col-lg-6">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                      <div class="col-md-4">
                                        @foreach ($album->image as $image)
                                        @if(!($loop->last))
                                        <img src="{{ $image->size }}" class="card-img" alt="...">
                                        @endif
                                        @endforeach
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">{{ $artist->name }}</h5>
                                          <p class="card-text">Streamable: {{ $artist->streamable }} <br/>
                                            Listeners: {{ $artist->listeners }}
                                         </p>
                                          <p class="card-text"><small class="text-muted">
                                            <a href="{{ route('showartist', ['artist' =>$artist->name]) }}" >
                                                VIEW </a>
                                        </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            @endforeach
                        @else
                            <p>Nothing to show
                        @endif
						
					</div><!-- /.row -->	
				</div><!-- /.tab-pane -->
			</div>				
		</div><!-- /.job-tab -->			
	</div><!-- /.container -->
</div>

  @endsection