<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookOriginal;
use Image;

class BookOriginalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookOriginal::orderBy('novel', 'ASC')->get();

        return view('layouts.books_listing', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.book_add');
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
            'novel' => 'required',
            'description' => 'required',
            'author' => 'required',
            'cover' => 'required',
        ]);
        
        $tempUrl = public_path().'/images/temp/'.$request->cover;
        $image = Image::make($tempUrl);
        $input['name'] = time().'.jpg';
     
        $destinationPath = public_path('/images/book-cover/150');
        $img = Image::make($tempUrl);
        $img->resize(150, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['name']);

        $destinationPath = public_path('/images/book-cover/48');
        $img = Image::make($tempUrl);
        $img->resize(48, 64, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['name']);
   
        $destinationPath = public_path('/images/book-cover/300');
        $image->save($destinationPath.'/'.$input['name']);

        $book = new BookOriginal();
        $book->novel = $request->input('novel');
        $book->description = $request->input('description');
        $book->abbreviation = $request->input('abbreviation');
        $book->lead = $request->input('lead');
        $book->status = $request->input('status');
        $book->cover = $input['name'];
        $book->author_id = $request->input('author');
        $book->book_type = $request->input('book_type');

        $book->save();

        return redirect('book_translated/'.$book['id'])
            ->with('success', 'Book created successfully.');
        //return view('layouts.book_view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = BookOriginal::where('id', $id)->get();

        return view('layouts.book_view', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BookOriginal::where('id', $id)->get();

        return view('layouts.book_edit', compact('book'));
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
            'novel' => 'required',
            'description' => 'required',
            'author' => 'required',
            'cover' => 'required',
        ]);

        $book = BookOriginal::where('id', $id);

        if($book['cover'] != $request->cover)
        {
            $tempUrl = public_path().'/images/temp/'.$request->cover;
            $image = Image::make($tempUrl);
            $input['name'] = time().'.jpg';
        
            $destinationPath = public_path('/images/book-cover/150');
            $img = Image::make($tempUrl);
            $img->resize(150, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['name']);

            $destinationPath = public_path('/images/book-cover/48');
            $img = Image::make($tempUrl);
            $img->resize(48, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['name']);
    
            $destinationPath = public_path('/images/book-cover/300');
            $image->save($destinationPath.'/'.$input['name']);
        }

        $book->update([
            'novel' => $request['genre'],
            'description' => $request['description'],
            'abbreviation' => $request['abbreviation'],
            'lead' => $request['lead'],
            'status' => $request['status'],
            'cover' => $request['cover'],
            'author' => $request['author'],
            'book_type' => $request['book_type']
        ]);

        return redirect('book_translated/'.$book['id'])
            ->with('success', 'Book created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookOriginal::where('id', $id);
        $book->delete();

        return redirect('book_translated')
        ->with('success', 'Book deleted successfully.');
    }
}
