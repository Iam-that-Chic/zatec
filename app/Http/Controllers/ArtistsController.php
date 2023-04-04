<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistsController extends Controller
{
    public function index()
    {
         //get all my fav albums and artists       
          $favs = Artist::where('user_id', Auth::user()->id)->get();
         return view('artist.index', compact('favs'));
    }

    public function store(Request $request)
   {
     
        //validate posted data
        $request->validate([
            'artist' => 'required',
        ]);
        //save a artist
        $fav = new Artist();
        $fav->artist = $request->artist;
        $fav->mbid = $request->mbid;
        $fav->user_id = Auth::user()->id;
        $fav->save();
        return response()->json(['success' => 'Artist favorited successfully!']);

   }

   public function delete(Request $request)
   {
        //unfav  delete a artist
        $deleted = Artist::where('user_id', Auth::user()->id)
        ->where('artist', $request->artist)
        ->delete();

        if ($deleted > 0) {
          // Records were deleted
          return response()->json(['success' => 'Artist unfavoured successfully!']);

          } else {
               // No records were deleted
          return response()->json(['error' => 'Error incurred unfavoring artist!']);
          }
        
     
   }
   
}
