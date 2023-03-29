@extends('layouts.app')
@section('content')
  <h3> Favorite Albums </h3>
  <div class="row">

  @if ($favs->count() > 0)
@foreach ( $favs as $fav)
<div class="col-md-6 col-lg-6">
  <div class="card" style="width: 44rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Artist : {{ $fav->artist }}</li>
      <li class="list-group-item">Album : {{ $fav->album }}</li>
      <li class="list-group-item">
        <a href="{{ route('showartist', ['artist' =>$fav->artist, 'album' =>$fav->album]) }}" >
          VIEW </a>
      </li>
    </ul>
  </div>
</div>
  <br/>   
@endforeach
@else
No detail
@endif
  </div>
@endsection