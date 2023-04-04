<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    public function index()
    {
         //get all my fav albums      
          $favs = Album::where('user_id', Auth::user()->id)->get();
         return view('album.index', compact('favs'));
    }

    public function store(Request $request)
   {
        //validate posted data
        $request->validate([
            'artist' => 'required',
            'album' => 'required',
        ]);
        $fav = new Album();
        $fav->artist = $request->artist;
        $fav->album = $request->album;
        $fav->mbid = $request->mbid;
        $fav->user_id = Auth::user()->id;
        $fav->save();
        return response()->json(['success' => 'Album favorited successfully!']);
   }


   public function delete(Request $request)
   {
        //unfav  delete 
        $deleted = Album::where('user_id', Auth::user()->id)
        ->where('album', $request->album)
        ->where('artist', $request->artist)
        ->delete();

        if ($deleted > 0) {
          // Records were deleted
          return response()->json(['success' => 'Album unfavoured successfully!']);
          } else {
          // No records were deleted
          return response()->json(['error' => 'Error incurred unfavoring album!']);
          }
        
   }
}
