<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LastfmController extends Controller
{
    public function index()
   {
        // get all top and artists
        $api = 'b18c7d34b70d3e6eb431112945c6f85e';
        $url = 'http://ws.audioscrobbler.com/2.0/?method=chart.gettopartists&api_key='.$api.'&format=json';
       
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post($url)->json();
        $results = $response['artists']['artist'];

        $favalbums = Album::where('user_id', Auth::user()->id)->pluck('artist','album')->toArray();
        $favartists = Artist::where('user_id', Auth::user()->id)->pluck('artist')->toArray();
        
     return view('dashboard', compact('results','favalbums','favartists'));  
   }
   public function search(Request $request)
   {
        //validate posted data
        $request->validate([
            'keyword' => 'required',
        ]);
        //search through album or artist by keyword and given method
        $api = 'b18c7d34b70d3e6eb431112945c6f85e';
        $album = 'http://ws.audioscrobbler.com/2.0/?method=album.search&album='.$request->keyword.'&api_key='.$api.'&format=json';
        $artist ='http://ws.audioscrobbler.com/2.0/?method=artist.search&artist='.$request->keyword.'&api_key='.$api.'&format=json';
       
        $responses = Http::pool(function(Pool $pool) use($album, $artist) {
            $pool->as('album')->get($album);
            $pool->as('artist')->get($artist);
         });
        if( $responses['album']->failed() &&  $responses['artist']->failed())
        {
            $albums =[];
            $artists = [];
        }else
        {
            $albums = json_decode($responses['album']);
            $albums = $albums->results->albummatches->album;
            $artists = json_decode($responses['artist']);
            $artists = $artists->results->artistmatches->artist;
        }

        if(Auth::check()){
            $favalbums = Album::where('user_id', Auth::user()->id)->pluck('artist','album')->toArray();
            $favartists = Artist::where('user_id', Auth::user()->id)->pluck('artist')->toArray();
        }
        else{
            $favalbums = [];
            $favartists = []; 
        }
       
     return view('search', compact('albums','artists','favartists','favalbums')); 
   }
  
   public function showArtist($artist)
   {
        //get info
        $api = 'b18c7d34b70d3e6eb431112945c6f85e';
        $url = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist='.$artist.'&api_key='.$api.'&format=json';
    
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post($url)->json();
        if (array_key_exists('error', $response)) {
            // There was an error
            $errorMessage = $response['message'];
            return redirect()->back()->withErrors($errorMessage);
        } else {
            // The response was successful
            $info = $response['artist'];
            return view('artist.show', compact('info'));  
        }
       
    }

    public function showAlbum($artist, $album)
   {
        // get info
        $api = 'b18c7d34b70d3e6eb431112945c6f85e';
        $url = 'http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key='.$api.'&artist='.$artist.'&album='.$album.'&format=json';
    
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post($url)->json();
        
        if (array_key_exists('error', $response)) {
            // There was an error
            $errorMessage = $response['message'];
            return redirect()->back()->withErrors($errorMessage);
        } else {
            // The response was successful
            $info = $response['album'];
            return view('album.show', compact('info'));  
        }
       
    }
}
