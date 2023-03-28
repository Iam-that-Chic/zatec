<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LastfmController extends Controller
{
    public function index()
   {
   // get all albums and artists
   $keyword = 'believe';
   $api = 'b18c7d34b70d3e6eb431112945c6f85e';
   $method = 'artist';
   if($method == 'album'){
       $url = 'http://ws.audioscrobbler.com/2.0/?method=album.search&album='.$keyword.'&api_key='.$api.'&format=json';
   }else{
       $url ='http://ws.audioscrobbler.com/2.0/?method=artist.search&artist='.$keyword.'&api_key='.$api.'&format=json';
   }
   $response = Http::withHeaders([
       'Accept' => 'application/json'
   ])->post($url)->json();
     dd($response['results']);
   }
   public function search(Request $request)
   {
        //validate posted data
        $request->validate([
            'keyword' => 'required',
            'type' => 'required',
        ]);
        //search through album or artist by keyword and given method
        $api = 'b18c7d34b70d3e6eb431112945c6f85e';
        if($request->type == 'album'){
            $album = 'http://ws.audioscrobbler.com/2.0/?method=album.search&album='.$$request->keyword.'&api_key='.$api.'&format=json';
        }else{
            $url ='http://ws.audioscrobbler.com/2.0/?method=artist.search&artist='.$$request->keyword.'&api_key='.$api.'&format=json';
        }
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post($url)->json();
        dd($response['results']);

     
   }
  
}
