<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
         //get all my fav albums and artists       
          $favs = Favorite::where('user_id', Auth::user()->id)->get();
         return view('content.index', compact('favs'));
    }
    public function favorite(Request $request)
   {
        //validate posted data
        $request->validate([
            'album_artist_id' => 'required',
            'type' => 'required',
        ]);
        //fav a song/album
        $fav = new Favorite();
        $fav->type = $request->type;
        $fav->mbid = $request->album_artist_id;
        $fav->user_id = Auth::user()->id;
        $fav->save();
        return redirect()->back()->with('success', 'Album/Artist favorited successfully!');
   }
   public function unfavorite($id)
   {
        //unfav  delete a song/album
        $fav = Favorite::find($id);  
        $fav->delete();
        return redirect()->back()->with('success', 'Album/Artist unfavoured successfully!');
   }
  
}
