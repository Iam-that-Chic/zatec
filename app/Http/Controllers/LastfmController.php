<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LastfmController extends Controller
{
    public function index()
   {
   // get all albums and artists
    $keyword = 'believe';
    $api = 'b18c7d34b70d3e6eb431112945c6f85e';
     $response = Http::withHeaders([
          'Accept' => 'application/json'
      ])->post('http://ws.audioscrobbler.com/2.0/?method=album.search&album='.$keyword.'&api_key='.$api.'&format=json',
      [
      ])->json();
      dd($response);
   }
   public function search()
   {
    http://ws.audioscrobbler.com/2.0/?method=artist.search&artist=cher&api_key=YOUR_API_KEY&format=json

    //search through album by keyword
    $keyword = 'believe';
    $api = 'b18c7d34b70d3e6eb431112945c6f85e';
     $response = Http::withHeaders([
          'Accept' => 'application/json'
      ])->post('http://ws.audioscrobbler.com/2.0/?method=album.search&album='.$keyword.'&api_key='.$api.'&format=json',
      [
      ])->json();
      dd($response);
   }
   public function favorite(Request $request)
   {
    //fav a song/album
   }
   public function unfavorite(Request $request)
   {
    //unfav a song/album
   }
}
