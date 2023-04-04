<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">

    <title>ZATEC</title>
  </head>
  <body>  
  <br>
  
  <div class="container">
 
        <!-- Page Content -->
        @include('layouts.nav')
        @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Error!</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
            </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
          </div>
          @endif
        @yield('content')
        
    </div>
      
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
@yield('scripts')
<script type="text/javascript">
  function myFavAlbum(album, artist, mbid) {
        // scripts for fav user albums and artist
        $.ajax({
            url: '/fav-album',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                album: album,
                artist: artist,
                mbid: mbid
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'successfull',
                    text: response.success
                }).then(() => {
                location.reload();
              });
            },
            error:function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + error
                });

            }
        });
    }
    function unFavAlbum(album, artist, mbid) {
        // Your function code goes here
        $.ajax({
            url: '/unfav-album',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                album: album,
                artist: artist,
                mbid: mbid
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'successfull',
                    text: response.success
                }).then(() => {
                location.reload();
              });
            },
            error:function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + error
                });

            }
        });
    }
    
    function myFavArtist(artist, mbid) {
        // Your function code goes here
        $.ajax({
            url: '/fav-artist',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                artist: artist,
                mbid: mbid
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'successfull',
                    text: response.success
                }).then(() => {
                location.reload();
              });
            },
            error:function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + error
                });

            }
        });
    }

    function unFavArtist(artist, mbid) {
        // Your function code goes here
        $.ajax({
            url: '/unfav-artist',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                artist: artist,
                mbid: mbid
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'successfull',
                    text: response.success
                }).then(() => {
                location.reload();
              });
            },
            error:function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + error
                });

            }
        });
    }
  
</script>
</html>
