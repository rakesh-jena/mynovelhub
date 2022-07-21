<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Tag;

class OthersController extends Controller
{
    public function index(){
        $genre = Genre::orderBy('genre', 'ASC')->get();
        $tags = Tag::orderBy('tag', 'ASC')->get();

        return view('layouts.others_listing', compact('genre', 'tags'));
    }

    public function addGenre(Request $request){
        $request->validate([
            'genre' => 'required',
            'description' => 'required'
        ]);
        
        $genre = new Genre();
        $genre->genre = $request->input('genre');
        $genre->description = $request->input('synopsis');
        $genre->save();
        return redirect('/others')->with('success', 'Genre Created');
    }
}
