<?php

namespace App\Http\Controllers;

use App\Models\BookGenre;
use App\Models\BookTag;
use App\Models\BookTranslated;
use App\Models\ChapterTranslation;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BookTranslatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookTranslated::orderBy('novel', 'asc')->get();

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

        $slug = Str::slug($request->input('novel'), "-");

        $tempUrl = 'images/temp/' . $request->cover;
        $image = Image::make($tempUrl);
        $input['name'] = time() . '.jpg';

        $destinationPath = 'images/book-cover/150';
        $img = Image::make($tempUrl);
        $img->resize(150, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['name']);

        $destinationPath = 'images/book-cover/48';
        $img = Image::make($tempUrl);
        $img->resize(48, 64, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['name']);

        $destinationPath = 'images/book-cover/300';
        $image->save($destinationPath . '/' . $input['name']);

        $book = new BookTranslated();
        $book->novel = $request->input('novel');
        $book->slug = $slug;
        $book->description = $request->input('description');
        $book->abbreviation = $request->input('abbreviation');
        $book->lead = $request->input('lead');
        $book->status = $request->input('status');
        $book->released = $input['released'];
        $book->cover = $input['name'];
        $book->author = $request->input('author');

        $book->save();

        return redirect('book_translated/' . $book['id'])
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
        $book = BookTranslated::where('id', $id)->get();
        $chapters = ChapterTranslation::where('book_id', $id)->orderBy('chapter_no', 'asc')->get();
        $genre_id = BookGenre::where('book_id', $id)->where('book_type', 'translation')->get();
        $tag_id = BookTag::where('book_id', $id)->where('book_type', 'translation')->get();

        $g_list = [];
        if ($genre_id) {
            foreach ($genre_id as $g) {
                $genre = Genre::where('id', $g->genre_id)->first();
                $g_list[] = [
                    'id' => $genre->id,
                    'genre' => $genre->genre,
                    'book_genre_id' => $g->id,
                ];
            }
        }

        $t_list = [];
        if ($tag_id) {
            foreach ($tag_id as $t) {
                $tag = Tag::where('id', $t->tag_id)->first();
                $t_list[] = [
                    'id' => $tag->id,
                    'tag' => $tag->tag,
                    'book_tag_id' => $t->id,
                ];
            }
        }

        return view('layouts.book_view', compact('book', 'chapters', 'g_list', 't_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BookTranslated::where('id', $id)->get();

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

        $book = BookTranslated::where('id', $id)->first();

        if ($book->cover != $request->cover) {
            $tempUrl = 'images/temp/' . $request->cover;
            $image = Image::make($tempUrl);
            $input['name'] = time() . '.jpg';

            $destinationPath = 'images/book-cover/150';
            $img = Image::make($tempUrl);
            $img->resize(150, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['name']);

            $destinationPath = 'images/book-cover/48';
            $img = Image::make($tempUrl);
            $img->resize(48, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['name']);

            $destinationPath = 'images/book-cover/300';
            $image->save($destinationPath . '/' . $input['name']);
        } else {
            $input['name'] = $book->cover;
        }

        $slug = Str::slug($request->input('novel'), "-");

        $update_book = BookTranslated::where('id', $id)->first()->update([
            'novel' => $request['novel'],
            'slug' => $slug,
            'description' => $request['description'],
            'abbreviation' => $request['abbreviation'],
            'lead' => $request['lead'],
            'status' => $request['status'],
            'released' => $request['released'],
            'cover' => $input['name'],
            'author' => $request['author'],
            'book_type' => $request['book_type'],
        ]);

        return redirect('book_translated/' . $book->id)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookTranslated::where('id', $id);
        $book->delete();

        return redirect('book_translated')
            ->with('success', 'Book deleted successfully.');
    }
}