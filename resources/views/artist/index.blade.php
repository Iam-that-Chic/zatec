@extends('layouts.app')
@section('content')
<div class="container-fluid header-section">
  <div class="container">
    <h1>Favorite Artists</h1>
    <nav aria-label="breadcrumb right">
      <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Favorite Artists</li>
      </ol>
    </nav>
  </div>
</div>
<br/>
  <div class="container">
  <div class="row">
  @if ($favs->count() > 0)
@foreach ( $favs as $fav)
<div class="col-md-4 col-lg-4">
  <div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Name : {{ $fav->artist }}</li>
      <li class="list-group-item">
        <a href="{{ route('showartist', ['artist' =>$fav->artist]) }}" class="btn btn-info" >
          VIEW </a>
      </li>
      <span class="fa fa-heart liked-icon" onclick="unFavArtist('{{ $fav->artist }}', '{{ $fav->mbid }}')"  title="LIKED"></span>
    </ul>
  </div>
</div>
  <br/>   
@endforeach
@else
No detail
@endif
</div>  
  </div>
@endsection