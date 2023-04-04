@extends('layouts.app')
@section('content')
<div class="container-fluid header-section">
  <div class="container">
    <h1>Search Results</h1>
    <nav aria-label="breadcrumb right">
      <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search</li>
      </ol>
    </nav>
  </div>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#tab1">Album</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab2">Artist</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="tab1" class="tab-pane fade show active">
      <h3>Album results </h3>
      <div class="container">
        <div class="row">
          @if ($albums > 0)
              @foreach ($albums as $album)
              <div class="col-md-4">
                <div class="card">
                  @foreach ($album->image as $index => $image)
                  @if ($loop->last)
                  <img src="{{ $image->{'#text'} }}" alt="Image">
                  @endif
                  @endforeach
                  @if (in_array($album->artist, $favalbums) && in_array($album->name, array_keys($favalbums)))
                  <!-- the album is one of the favorite albums -->
                  <span class="fa fa-heart liked-icon" title="LIKED" onclick="unFavAlbum('{{ $album->name }}', '{{ $album->artist }}')"></span>
                  @else
                  <span class="fa fa-heart like-icon" onclick="myFavAlbum('{{ $album->name }}', '{{ $album->artist }}', '{{ $album->mbid }}')" title="LIKE ME"></span>
                  @endif
                  <div class="card-body">
                    <h4 class="card-title">{{ $album->name }}</h4>
                    <p class="card-text">Artist: {{ $album->artist }}</p>
                  </div>
                  <div class="card-footer">
                    <a class="btn btn-info" href="{{ route('showalbum', ['artist' =>$album->artist, 'album' =>$album->name]) }}" >
                      VIEW MORE</a>
                  </div>
                </div>
              </div>
              @endforeach
          @else
          <div class="col-md-12 col-lg-12">
          <p class="text-danger">Nothing to show</p>
          </div>
          @endif
        </div>
    </div>
    </div>
    <div id="tab2" class="tab-pane fade">
      <h3>Artist Results</h3>
      <div class="container">
        <div class="row">
          @if ($artists > 0)
          @foreach ($artists as $artist)
          <div class="col-md-6 col-lg-6">
              <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      @foreach ($artist->image as $image)
                      @if($loop->last)
                      <img src="{{ $image->{'#text'} }}" class="card-img" alt="..."/>
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
                          <a href="{{ route('showartist', ['artist' =>$artist->name]) }}" class="btn btn-info">
                              VIEW MORE</a>
                      </small></p>
                      @if (in_array( $artist->name , $favartists))
                       <!-- the artist is one of the favorite artist -->
                        <span class="fa fa-heart liked-icon" onclick="unFavArtist('{{ $artist->name }}'"  title="LIKED"></span>
                        @else
                        <span class="fa fa-heart like-icon" onclick="myFavArtist('{{ $artist->name }}', '{{ $artist->mbid}} ')" title="LIKE ME"></span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
          </div>
          @endforeach
      @else
          <p class="text-danger">Nothing to show</p>
      @endif
    </div>
    </div>
    </div>
  </div>
</div>

@section('scripts')
   
@endsection
  @endsection