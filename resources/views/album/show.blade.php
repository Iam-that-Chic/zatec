@extends('layouts.app')
@section('content')
    <div class="card" style="width: 44rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Artist : {{ $info['artist'] }} </li>
            <li class="list-group-item">Name : {{ $info['name'] }}</li>
            <li class="list-group-item">Listeners : {{ $info['listeners'] }}</li>
            <li class="list-group-item">Playcount : {{ $info['playcount'] }}</li>
            <li class="list-group-item">Url : {{ $info['url'] }}</li>
            <li class="list-group-item">Favourite : {{ $info['artist'] }}</li>
        </ul>
    </div>
    <br />
    <!-- Gallery -->
    <div class="row">
        @foreach ($info['image'] as $image)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="{{ $image['#text'] }}" class="w-100 shadow-1-strong rounded mb-4" alt="" />
            </div>
        @endforeach
    </div>
    <!-- Gallery -->
@endsection
