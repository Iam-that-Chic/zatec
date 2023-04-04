@extends('layouts.app')
@section('content')
<div class="container-fluid header-section">
  <div class="container">
    <h1>Dashboard</h1>
    <nav aria-label="breadcrumb right">
      <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>
</div>
<br/>
<h3>TOP ARTISTS </h3> 
@if ($results > 0)
<div class="row">
    @foreach ($results as $result)
    <div class="col-md-4">
      <div class="card">
        @foreach ($result['image'] as $index => $image)
        @if ($loop->last)
        <img src="{{ $image['#text']  }}" alt="Image">
        @endif
        @endforeach
        @if ($favalbums > 0)
        @if (in_array($result['name'], $favartists))
        <!-- the artist is one of the favorite artist -->
        <span class="fa fa-heart liked-icon" title="LIKED" onclick="unFavArtist('{{ $result['name'] }}')"></span>
        @else
        <span class="fa fa-heart like-icon" onclick="myFavArtist('{{ $result['name'] }}')" title="LIKE ME"></span>
        @endif
        @endif
        <div class="card-body">
          <h4 class="card-title">{{ $result['name']}}</h4>
          <p class="card-text">Playcount: {{ $result['playcount'] }} <br/>
            Listeners: {{ $result['listeners'] }} <br/>
          </p>
          <p class="card-text"><small class="text-muted">Streamable: {{ $result['streamable'] }}</small></p>
        </div>
        <div class="card-footer">
          <a class="btn btn-info" href="{{ route('showartist', ['artist' =>$result['name']]) }}" >
            VIEW MORE</a>
        </div>
      </div>
    </div>
    @endforeach
</div>
@else
    <p>Nothing to show
@endif

  @endsection