<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function index()
    {
    }

    public function addGenre(Request $request)
    {
        $request->validate([
            'genre' => 'required',
            'description' => 'required',
        ]);

        $genre = new Genre();
        $genre->genre = $request->input('genre');
        $genre->description = $request->input('synopsis');
        $genre->save();
        return redirect('/others')->with('success', 'Genre Created');
    }
}