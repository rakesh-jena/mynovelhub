<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::orderBy('genre', 'ASC')->get();

        return response()->json($genre);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('layouts.others_listing');
        return route('others');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required',
            'description' => 'required'
        ]);
        
        $slug = Str::slug($request->genre, "-");
        $request->request->add(['slug', $slug]);
        
        Genre::create($request->all());

        return redirect()->route('others')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::where('id', $id)->get();
        return response()->json($genre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('genres.edit', compact('genre'));
        return route('others');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'genre' => 'required',
            'description' => 'required'
        ]);

        $genre = Genre::where('id', $id);
        $genre->update([
            'genre' => $request['genre'],
            'description' => $request['description']
        ]);

        return redirect()->route('others')
            ->with('success', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::where('id', $id);
        $genre->delete();

        return redirect()->route('others')
            ->with('success', 'Genre deleted successfully');
    }
}
