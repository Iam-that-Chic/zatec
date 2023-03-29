@extends('layouts.app')
@section('content')

<h1>TOP ARTISTS </h1> 
@if ($results > 0)
<div class="row">
    @foreach ($results as $result)
    <div class="col-md-6">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            @if ($result['image'] > 0)
                @foreach ($result['image'] as $image)
                    <img src="{{ $image['#text']  }}" class="card-img" alt="..." height="100%">
                    @break
                @endforeach
                @else
                <img src="" class="card-img" alt="No image" height="100%">
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('showartist', ['artist' =>$result['name']]) }}"> {{ $result['name'] }} </a></h5>
              <p class="card-text">Playcount: {{ $result['playcount'] }} <br/>
                Listeners: {{ $result['listeners'] }} <br/>
              </p>
              <p class="card-text"><small class="text-muted">Streamable: {{ $result['streamable'] }}</small></p>
             @if ($favalbums > 0)
             @if (in_array($result['name'], $favartists))
                <span >
                  <a href="{{ route('artist.delete',['id'=>$result['name']]) }}" 
                    class="btn btn-success btn-outline text-center " role="button">
                    <i class="fa-solid fa fa-heart fa-2xl" style="color: #fb041d;"></i> liked</a>
                </span>
                @else
                <form method="POST" action="{{ route('artist.store',['artist'=>$result['name']]) }}">
                  @csrf
                  <input name="artist" value="{{ $result['name'] }}" type="hidden" />
                  <a href="route('artist.store',['artist'=>$result['name']])" class="btn btn-outline btn-success"
                      onclick="event.preventDefault();
                              this.closest('form').submit();">
                              <span> <i class="fa-solid fa fa-heart fa-2xl" style="color: #393939;"></i> Like</a></span>
                          </a>
              </form>  
                   
                @endif 
             @endif
             
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@else
    <p>Nothing to show
@endif
@endsection