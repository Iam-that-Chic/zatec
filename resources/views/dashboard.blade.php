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
              <p class="card-text"> {{ $result['playcount'] }} <br/>
                {{ $result['listeners'] }} <br/>
                {{ $result['mbid'] }} <br/></p>
              <p class="card-text"><small class="text-muted"> {{ $result['streamable'] }}</small></p>
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